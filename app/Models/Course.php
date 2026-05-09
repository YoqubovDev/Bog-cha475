<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Traits\DecodesHtmlEntities;

class Course extends Model
{
    use DecodesHtmlEntities;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'duration',
        'student_count'
    ];

    protected $decodeable = ['title', 'description'];

    // Course bir nechta videoga ega bo'lishi mumkin
    public function videos(): HasMany
    {
        return $this->hasMany(Video::class);
    }
}