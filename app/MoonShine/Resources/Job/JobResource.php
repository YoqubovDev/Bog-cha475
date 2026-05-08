<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Job;

use Illuminate\Database\Eloquent\Model;
use App\Models\Job;
use App\MoonShine\Resources\Job\Pages\JobIndexPage;
use App\MoonShine\Resources\Job\Pages\JobFormPage;
use App\MoonShine\Resources\Job\Pages\JobDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Job, JobIndexPage, JobFormPage, JobDetailPage>
 */
class JobResource extends ModelResource
{
    protected string $model = Job::class;

    protected string $title = 'Bo\'sh ish o\'rinlari';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            JobIndexPage::class,
            JobFormPage::class,
            JobDetailPage::class,
        ];
    }
}
