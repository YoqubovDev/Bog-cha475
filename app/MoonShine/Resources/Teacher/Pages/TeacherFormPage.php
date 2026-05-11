<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Teacher\Pages;

use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Teacher\TeacherResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use App\MoonShine\Resources\Category\CategoryResource;
use App\MoonShine\Resources\Group\GroupResource;
use Throwable;


/**
 * @extends FormPage<TeacherResource>
 */
class TeacherFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make("Tarbiyachi qo'shish", [
                ID::make(),

                BelongsTo::make('Kategoriya', 'category', 'category', CategoryResource::class)
                    ->required(),

                Text::make('Ism', 'name')->required()->unescape(),

                Textarea::make('Bio', 'bio')
                    ->unescape()
                    ->customAttributes([
                        'rows' => 5
                    ]),

                Image::make('Rasm', 'image')
                    ->dir('teachers')
                    ->allowedExtensions(['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'])
                    ->removable(),

            ]),
        ];
    }

    protected function buttons(): ListOf
    {
        return parent::buttons();
    }

    protected function formButtons(): ListOf
    {
        return parent::formButtons();
    }

    protected function rules(DataWrapperContract $item): array
    {
        return [];
    }

    /**
     * @param  FormBuilder  $component
     *
     * @return FormBuilder
     */
    protected function modifyFormComponent(FormBuilderContract $component): FormBuilderContract
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
