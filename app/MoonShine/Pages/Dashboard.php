<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Metrics\Wrapped\ValueMetric;
use MoonShine\UI\Components\Layout\Grid;
use MoonShine\UI\Components\Layout\Column;
use MoonShine\UI\Components\Layout\Box;
use App\Models\Teacher;
use App\Models\Group;
use App\Models\News;
use App\Models\Achievement;
use App\Models\Child;
use App\Models\Job;
use App\Models\JobApplication;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\UI\Fields\Text;

#[\MoonShine\MenuManager\Attributes\SkipMenu]

class Dashboard extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Dashboard';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
    {
        // Bog'cha statistikasi
        $totalChildren = Child::count();
        $totalGroups = Group::count();
        $totalTeachers = Teacher::count();
        $totalApplications = JobApplication::count();
        
        $totalNews = News::count();
        $totalAchievements = Achievement::count();
        $totalVacancies = Job::count();
        
        // Guruhlar bo'yicha bolalar soni (chart uchun)
        $groupsData = Group::withCount('students')->get();
        $groupNames = $groupsData->pluck('name')->toArray();
        $childrenCounts = $groupsData->pluck('students_count')->toArray();

        return [
            // Asosiy statistikalar
            Grid::make([
                Column::make([
                    ValueMetric::make('Jami Bolalar')
                        ->value($totalChildren)
                        ->icon('users'),
                ])->columnSpan(12, 6, 3),

                Column::make([
                    ValueMetric::make('Jami Guruhlar')
                        ->value($totalGroups)
                        ->icon('user-group'),
                ])->columnSpan(12, 6, 3),

                Column::make([
                    ValueMetric::make('Jami Tarbiyachilar')
                        ->value($totalTeachers)
                        ->icon('identification'),
                ])->columnSpan(12, 6, 3),

                Column::make([
                    ValueMetric::make('Yangi Arizalar')
                        ->value($totalApplications)
                        ->icon('document-text'),
                ])->columnSpan(12, 6, 3),
            ]),
            
            // Qo'shimcha statistikalar
            Grid::make([
                Column::make([
                    ValueMetric::make('Yangiliklar')
                        ->value($totalNews)
                        ->icon('megaphone'),
                ])->columnSpan(12, 6, 4),
                
                Column::make([
                    ValueMetric::make('Yutuqlar')
                        ->value($totalAchievements)
                        ->icon('trophy'),
                ])->columnSpan(12, 6, 4),
                
                Column::make([
                    ValueMetric::make('Vakansiyalar')
                        ->value($totalVacancies)
                        ->icon('briefcase'),
                ])->columnSpan(12, 6, 4),
            ]),
            
            // Diagramma va Jadval
            Grid::make([
                // Guruhlar statistikasi
                Column::make([
                    $this->createGroupDistributionChart($groupNames, $childrenCounts),
                ])->columnSpan(12, 6, 7),
                
                // So'nggi arizalar
                Column::make([
                    Box::make('So\'nggi arizalar', [
                        TableBuilder::make()
                            ->items(JobApplication::latest()->limit(5)->get())
                            ->fields([
                                Text::make('Ism', 'name'),
                                Text::make('Telefon', 'phone'),
                                Text::make('Lavozim', 'job_title'),
                            ])
                    ])
                ])->columnSpan(12, 6, 5),
            ]),
        ];
    }
    
    /**
     * Guruhlar bo'yicha bolalar taqsimoti Chart
     */
    private function createGroupDistributionChart(array $labels, array $values): ComponentContract
    {
        $chartId = 'group-distribution-chart';
        $colors = ['#8b5cf6', '#06b6d4', '#10b981', '#f59e0b', '#ef4444', '#3b82f6'];
        
        $chartConfig = [
            'type' => 'bar',
            'data' => [
                'labels' => $labels,
                'datasets' => [[
                    'label' => 'Bolalar soni',
                    'data' => $values,
                    'backgroundColor' => array_slice(array_merge($colors, $colors, $colors), 0, count($labels)),
                    'borderWidth' => 0,
                    'borderRadius' => 8
                ]]
            ],
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => true,
                'plugins' => [
                    'legend' => [
                        'display' => false
                    ],
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'ticks' => [
                            'stepSize' => 1
                        ]
                    ]
                ]
            ]
        ];
        
        return Box::make('Guruhlardagi bolalar soni', [
            new class($chartId, $chartConfig) extends \MoonShine\UI\Components\MoonShineComponent {
                public function __construct(
                    private string $chartId,
                    private array $chartConfig
                ) {
                    parent::__construct('chart-component');
                }
                
                protected string $view = 'moonshine.dashboard-chart';
                
                protected function viewData(): array
                {
                    return [
                        'chartId' => $this->chartId,
                        'title' => 'Guruhlardagi bolalar soni',
                        'height' => '300px',
                        'chartConfig' => $this->chartConfig
                    ];
                }
            }
        ]);
    }
}

