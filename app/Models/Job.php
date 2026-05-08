<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'vacancies';

    protected $fillable = [
        'title',
        'description',
        'type',
        'salary',
        'location',
        'is_active',
    ];
}
