<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\Palettes\PurplePalette;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Contracts\ColorManager\PaletteContract;
use App\MoonShine\Resources\Achievement\AchievementResource;
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\Contact\ContactResource;
use App\MoonShine\Resources\Course\CourseResource;
use App\MoonShine\Resources\Departments\DepartmentsResource;
use App\MoonShine\Resources\Group\GroupResource;
use App\MoonShine\Resources\HomeSlider\HomeSliderResource;
use App\MoonShine\Resources\News\NewsResource;
use App\MoonShine\Resources\PhotoCard\PhotoCardResource;
use App\MoonShine\Resources\Reception\ReceptionResource;
use App\MoonShine\Resources\Slider\SliderResource;
use App\MoonShine\Resources\Teacher\TeacherResource;
use App\MoonShine\Resources\Video\VideoResource;
use App\MoonShine\Resources\AboutStatic\AboutStaticResource;
use App\MoonShine\Resources\TeacherStats\TeacherStatsResource;
use App\MoonShine\Resources\ExamStats\ExamStatsResource;
use App\MoonShine\Resources\Category\CategoryResource;
use App\MoonShine\Resources\Child\ChildResource;

final class MoonShineLayout extends AppLayout
{
    /**
     * @var null|class-string<PaletteContract>
     */
    protected ?string $palette = PurplePalette::class;

    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...parent::menu(),

            MenuGroup::make("Home", [
                MenuItem::make(ReceptionResource::class)->icon('briefcase'),
                MenuItem::make(HomeSliderResource::class)->icon('user-group'),
            ])->icon("home"),

            MenuGroup::make("Bog'cha haqida", [

                MenuItem::make(AboutStaticResource::class)->icon('arrow-trending-up'),
                MenuItem::make(NewsResource::class)->icon('megaphone'),

            ])->icon("building-library"),


            MenuGroup::make("Tarbiyachilar", [
                MenuItem::make(CategoryResource::class, 'Category')->icon('users'),
                // MenuItem::make(TeacherStatsResource::class)->icon('presentation-chart-line'),
                MenuItem::make(TeacherResource::class)->icon("user"),
                MenuItem::make(GroupResource::class)->icon('user-group'),
                MenuItem::make(ChildResource::class, 'Bolalar')->icon('user-group'),
//                MenuItem::make(DepartmentsResource::class)->icon("building-office-2"),

            ])->icon("users"),


            MenuGroup::make("Dars jarayonlari", [
                MenuItem::make(CourseResource::class)->icon('book-open'),
                // MenuItem::make(VideoResource::class)->icon('video-camera'),


            ])->icon("academic-cap"),


            MenuGroup::make("Yutuqlar", [
                MenuItem::make(ExamStatsResource::class)->icon('presentation-chart-line'),
                MenuItem::make(AchievementResource::class)->icon('trophy'),


            ])->icon("trophy"),

            MenuItem::make(ContactResource::class)->icon('phone'),



            MenuGroup::make("Jarayonda ..... ", [
                MenuItem::make(PhotoCardResource::class),
                MenuItem::make(SliderResource::class),

            ])->icon("wrench-screwdriver"),
            
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    protected function footer(): string
    {
        return "";
    }
}
