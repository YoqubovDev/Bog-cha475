<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\DecodesHtmlEntities;

class Job extends Model
{
    use DecodesHtmlEntities;

    protected $table = 'vacancies';

    protected $fillable = [
        'title',
        'description',
        'type',
        'salary',
        'location',
        'is_active',
    ];

    protected $decodeable = ['title', 'description', 'location'];
}
