<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Reception;

use Illuminate\Database\Eloquent\Model;
use App\Models\Reception;
use App\MoonShine\Resources\Reception\Pages\ReceptionIndexPage;
use App\MoonShine\Resources\Reception\Pages\ReceptionFormPage;
use App\MoonShine\Resources\Reception\Pages\ReceptionDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Reception, ReceptionIndexPage, ReceptionFormPage, ReceptionDetailPage>
 */
class ReceptionResource extends ModelResource
{
    protected string $model = Reception::class;

    protected string $title = "Bog'cha hududi";

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            ReceptionIndexPage::class,
            ReceptionFormPage::class,
            ReceptionDetailPage::class,
        ];
    }
}
