<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Child;

use Illuminate\Database\Eloquent\Model;
use App\Models\Child;
use App\MoonShine\Resources\Child\Pages\ChildIndexPage;
use App\MoonShine\Resources\Child\Pages\ChildFormPage;
use App\MoonShine\Resources\Child\Pages\ChildDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Child, ChildIndexPage, ChildFormPage, ChildDetailPage>
 */
class ChildResource extends ModelResource
{
    protected string $model = Child::class;

    protected string $title = 'Children';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ChildIndexPage::class,
            ChildFormPage::class,
            ChildDetailPage::class,
        ];
    }
}
