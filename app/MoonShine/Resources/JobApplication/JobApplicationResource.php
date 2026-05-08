<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\JobApplication;

use Illuminate\Database\Eloquent\Model;
use App\Models\JobApplication;
use App\MoonShine\Resources\JobApplication\Pages\JobApplicationIndexPage;
use App\MoonShine\Resources\JobApplication\Pages\JobApplicationFormPage;
use App\MoonShine\Resources\JobApplication\Pages\JobApplicationDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<JobApplication, JobApplicationIndexPage, JobApplicationFormPage, JobApplicationDetailPage>
 */
class JobApplicationResource extends ModelResource
{
    protected string $model = JobApplication::class;

    protected string $title = 'Arizalar';
    
    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            JobApplicationIndexPage::class,
            JobApplicationFormPage::class,
            JobApplicationDetailPage::class,
        ];
    }
}
