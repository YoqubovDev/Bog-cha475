<?php

declare(strict_types=1);

namespace App\MoonShine\Resources\Teacher;

use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;
use App\MoonShine\Resources\Teacher\Pages\TeacherIndexPage;
use App\MoonShine\Resources\Teacher\Pages\TeacherFormPage;
use App\MoonShine\Resources\Teacher\Pages\TeacherDetailPage;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Contracts\Core\PageContract;

/**
 * @extends ModelResource<Teacher, TeacherIndexPage, TeacherFormPage, TeacherDetailPage>
 */
class TeacherResource extends ModelResource
{
    protected string $model = Teacher::class;

    protected string $title = "Tarbiyachi";

    /**
     * Eager load relationships to avoid N+1 queries
     */
    protected array $with = ['category'];

    /**
     * @return list<class-string<PageContract>>
     */
    protected function pages(): array
    {
        return [
            TeacherIndexPage::class,
            TeacherFormPage::class,
            TeacherDetailPage::class,
        ];
    }
}
