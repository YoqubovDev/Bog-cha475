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
use App\Models\TeacherStats;
use App\Models\ExamStats;
use App\Models\Course;
use App\Models\Group;
use App\Models\News;
use App\Models\Achievement;
use App\Models\Video;
use App\Models\Contact;
use App\Models\Departments;
use App\Models\Reception;
use App\Models\HomeSlider;
use App\Models\AboutStatic;
use App\Models\PhotoCard;
use App\Models\Slider;
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
        // Asosiy ma'lumotlar - faqat kerakli narsalar

        
        // Asosiy statistikalar
        $totalTeachers = Teacher::count();
        $totalGroups = Group::count();
        $totalNews = News::count();
        $totalAchievements = Achievement::count();
        $totalDepartments = Departments::count();
        
        // O'qituvchilar statistikasi
        $asosiyTeachers = $teacherStats?->asosiy ?? 0;
        $ilmiyTeachers = $teacherStats?->ilmiy ?? 0;
        $kuratorTeachers = $teacherStats?->kurator ?? 0;
        $tashqiTeachers = $teacherStats?->tashqi ?? 0;
        
        // Imtihon statistikasi
        $cefr = $examStats?->cefr ?? 0;
        $universitet = $examStats?->universitet ?? 0;
        $ielts = $examStats?->ielts ?? 0;
        $sat = $examStats?->sat ?? 0;

        
        return [
            // Asosiy statistikalar - faqat muhim narsalar
            Grid::make([
                Column::make([
                    ValueMetric::make('Jami O\'qituvchilar')
                        ->value((int) $totalTeachers)
                        ->icon('users'),
                ])->columnSpan(12, 6, 3),

                

                
                Column::make([
                    ValueMetric::make('Jami Guruhlar')
                        ->value($totalGroups)
                        ->icon('user-group'),
                ])->columnSpan(12, 6, 3),
            ]),
            
            // Ikkinchi qator - qo'shimcha statistikalar
            Grid::make([
                Column::make([
                    ValueMetric::make('Yangiliklar')
                        ->value($totalNews)
                        ->icon('megaphone'),
                ])->columnSpan(12, 6, 3),
                
                Column::make([
                    ValueMetric::make('Yutuqlar')
                        ->value($totalAchievements)
                        ->icon('trophy'),
                ])->columnSpan(12, 6, 3),
                
//                Column::make([
//                    ValueMetric::make('Videolar')
//                        ->value($totalVideos)
//                        ->icon('video-camera'),
//                ])->columnSpan(12, 6, 3),
                
                Column::make([
                    ValueMetric::make('Bo\'limlar')
                        ->value($totalDepartments)
                        ->icon('building-office-2'),
                ])->columnSpan(12, 6, 3),
            ]),
            
            // Diagrammalar - faqat muhim diagrammalar
            Grid::make([
                // O'qituvchilar statistikasi - Pie Chart
                Column::make([
                    $this->createTeacherStatsChart($asosiyTeachers, $ilmiyTeachers, $kuratorTeachers, $tashqiTeachers),
                ])->columnSpan(12, 6, 6),
                
                // Imtihon statistikasi - Bar Chart
                Column::make([
                    $this->createExamStatsChart($cefr, $universitet, $ielts, $sat),
                ])->columnSpan(12, 6, 6),
            ]),
            

        ];
    }
    
    /**
     * O'qituvchilar statistikasi uchun Pie Chart yaratish
     */
    private function createTeacherStatsChart(int $asosiy, int $ilmiy, int $kurator, int $tashqi): ComponentContract
    {
        $chartId = 'teacher-stats-chart';
        $labels = ['Asosiy', 'Ilmiy daraja', 'Kurator', 'Tashqi'];
        $values = [$asosiy, $ilmiy, $kurator, $tashqi];
        $colors = ['#8b5cf6', '#06b6d4', '#10b981', '#f59e0b'];
        
        $chartConfig = [
            'type' => 'pie',
            'data' => [
                'labels' => $labels,
                'datasets' => [[
                    'data' => $values,
                    'backgroundColor' => $colors,
                    'borderWidth' => 2,
                    'borderColor' => '#fff'
                ]]
            ],
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => true,
                'plugins' => [
                    'legend' => [
                        'position' => 'bottom',
                        'labels' => [
                            'padding' => 15,
                            'font' => [
                                'size' => 12
                            ]
                        ]
                    ],
                    'tooltip' => [
                        'callbacks' => [
                            'label' => 'function(context) { let label = context.label || \'\'; if (label) { label += \': \'; } label += context.parsed + \' ta\'; return label; }'
                        ]
                    ]
                ]
            ]
        ];
        
        return Box::make('O\'qituvchilar Statistikasi', [
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
                        'title' => 'O\'qituvchilar Statistikasi',
                        'height' => '300px',
                        'chartConfig' => $this->chartConfig
                    ];
                }
            }
        ]);
    }
    
    /**
     * Imtihon statistikasi uchun Bar Chart yaratish
     */
    private function createExamStatsChart(int $cefr, int $universitet, int $ielts, int $sat): ComponentContract
    {
        $chartId = 'exam-stats-chart';
        $labels = ['CEFR', 'Universitet %', 'IELTS', 'SAT'];
        $values = [$cefr, $universitet, $ielts, $sat];
        $colors = ['#3b82f6', '#10b981', '#f59e0b', '#ef4444'];
        
        $chartConfig = [
            'type' => 'bar',
            'data' => [
                'labels' => $labels,
                'datasets' => [[
                    'label' => 'Ballar',
                    'data' => $values,
                    'backgroundColor' => $colors,
                    'borderWidth' => 2,
                    'borderColor' => '#fff',
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
                    'tooltip' => [
                        'callbacks' => [
                            'label' => 'function(context) { return context.parsed.y + \' ball\'; }'
                        ]
                    ]
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
        
        return Box::make('Imtihon Statistikasi', [
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
                        'title' => 'Imtihon Statistikasi',
                        'height' => '300px',
                        'chartConfig' => $this->chartConfig
                    ];
                }
            }
        ]);
    }
    
    /**
     * Kurslar statistikasi uchun Line Chart yaratish
     */
    private function createCoursesChart($courses): ComponentContract
    {
        $chartId = 'courses-chart';
        $labels = $courses->pluck('title')->toArray();
        $students = $courses->pluck('student_count')->toArray();
        $videos = $courses->pluck('videos_count')->toArray();
        
        $chartConfig = [
            'type' => 'line',
            'data' => [
                'labels' => $labels,
                'datasets' => [
                    [
                        'label' => 'Talabalar soni',
                        'data' => $students,
                        'borderColor' => '#8b5cf6',
                        'backgroundColor' => 'rgba(139, 92, 246, 0.1)',
                        'tension' => 0.4,
                        'fill' => true,
                        'borderWidth' => 3
                    ],
                    [
                        'label' => 'Videolar soni',
                        'data' => $videos,
                        'borderColor' => '#06b6d4',
                        'backgroundColor' => 'rgba(6, 182, 212, 0.1)',
                        'tension' => 0.4,
                        'fill' => true,
                        'borderWidth' => 3
                    ]
                ]
            ],
            'options' => [
                'responsive' => true,
                'maintainAspectRatio' => true,
                'plugins' => [
                    'legend' => [
                        'position' => 'top',
                        'labels' => [
                            'padding' => 15,
                            'font' => [
                                'size' => 12
                            ]
                        ]
                    ],
                    'tooltip' => [
                        'mode' => 'index',
                        'intersect' => false
                    ]
                ],
                'scales' => [
                    'y' => [
                        'beginAtZero' => true,
                        'ticks' => [
                            'stepSize' => 1
                        ]
                    ]
                ],
                'interaction' => [
                    'mode' => 'nearest',
                    'axis' => 'x',
                    'intersect' => false
                ]
            ]
        ];
        
        return Box::make('Kurslar va Talabalar Statistikasi', [
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
                        'title' => 'Kurslar va Talabalar Statistikasi',
                        'height' => '400px',
                        'chartConfig' => $this->chartConfig
                    ];
                }
            }
        ]);
    }
}
