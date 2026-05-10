<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Teacher\Pages;

use MoonShine\Laravel\Pages\Crud\DetailPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\Contracts\UI\FieldContract;
use App\MoonShine\Resources\Teacher\TeacherResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;
use App\MoonShine\Resources\Category\CategoryResource;
use App\MoonShine\Resources\Group\GroupResource;
use MoonShine\UI\Fields\Textarea;
use Throwable;


/**
 * @extends DetailPage<TeacherResource>
 */
class TeacherDetailPage extends DetailPage
{
    /**
     * @return list<FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            ID::make(),
            Text::make('Ism', 'name'),

            // Kategoriya: Tarbiyachi yoki Yordam tarbiyachi
            BelongsTo::make('Kategoriya', 'category', 'category', CategoryResource::class),

            // // Biriktirilgan guruh
            // BelongsTo::make('Guruh', 'group', 'name', GroupResource::class),

            Textarea::make('Bio', 'bio')->raw(),
            Image::make('Rasm', 'image'),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    /**
     * @param  TableBuilder  $component
     *
     * @return TableBuilder
     */
    protected function modifyDetailComponent(ComponentContract $component): ComponentContract
    {
        return $component;
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function topLayer(): array
    {
        return [
            ...parent::topLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function mainLayer(): array
    {
        return [
            ...parent::mainLayer()
        ];
    }

    /**
     * @return list<ComponentContract>
     * @throws Throwable
     */
    protected function bottomLayer(): array
    {
        return [
            ...parent::bottomLayer()
        ];
    }
}
