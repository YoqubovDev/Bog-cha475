<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\HomeSlider;

use Illuminate\Database\Eloquent\Model;
use App\Models\HomeSlider;
use App\MoonShine\Resources\HomeSlider\Pages\HomeSliderIndexPage;
use App\MoonShine\Resources\HomeSlider\Pages\HomeSliderFormPage;
use App\MoonShine\Resources\HomeSlider\Pages\HomeSliderDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<HomeSlider, HomeSliderIndexPage, HomeSliderFormPage, HomeSliderDetailPage>
 */
class HomeSliderResource extends ModelResource
{
    protected string $model = HomeSlider::class;

    protected string $title = "Bog'cha rahbariyati";

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            HomeSliderIndexPage::class,
            HomeSliderFormPage::class,
            HomeSliderDetailPage::class,
        ];
    }
}
