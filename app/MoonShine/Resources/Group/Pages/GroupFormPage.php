<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Group\Pages;

use App\MoonShine\Resources\Category\CategoryResource;
use App\MoonShine\Resources\Teacher\TeacherResource;
use MoonShine\Laravel\Fields\Relationships\BelongsTo;
use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Pages\Crud\FormPage;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FormBuilderContract;
use MoonShine\UI\Components\FormBuilder;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\Core\TypeCasts\DataWrapperContract;
use App\MoonShine\Resources\Group\GroupResource;
use MoonShine\Support\ListOf;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;
use Throwable;


/**
 * @extends FormPage<GroupResource>
 */
class GroupFormPage extends FormPage
{
    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function fields(): iterable
    {
        return [
            Box::make([
                ID::make()->sortable(),
                Text::make('Guruh Nomi', 'name')->required(),
                Select::make('Til', 'language')
                    ->options([
                        'uz-icon' => 'O‘zbek tili',
                        'ru-icon' => 'Rus tili',
                    ])
                    ->nullable()
                    ->searchable(),
                Text::make('Tarbiylanuvchilar soni', 'group_number')->required(),
                BelongsTo::make('Tarbiyalovchi', 'teacher', 'name', TeacherResource::class)
                    ->required(),
                BelongsTo::make('Yordamchi tarbiyachi', 'assistant', 'name', TeacherResource::class)
                    ->nullable(),
                \MoonShine\Laravel\Fields\Relationships\HasMany::make('Tarbiylanuvchilar', 'children', null, \App\MoonShine\Resources\Child\ChildResource::class),
                Textarea::make('Guruh BIO', 'bio')->required(),
                Number::make('Natija foizi', 'result_percentage')->nullable(),
                Image::make('Guruh Rasmi ', 'image')->dir('groups')->removable()->required()
                    ->allowedExtensions(['jpg', 'jpeg', 'png', 'webp']),
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
        return [
            'name' => 'required|string|max:255',
            'language' => 'required|string',
            'group_number' => 'required|integer|min:1',
            'bio' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'result_percentage' => 'nullable|integer|min:0|max:100',
        ];
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
