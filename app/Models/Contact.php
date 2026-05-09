<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\DecodesHtmlEntities;

class Contact extends Model
{
    use HasFactory, DecodesHtmlEntities;

    protected $fillable = [
        'address',
        'phone',
        'fax',
        'email',
        'work_time',
        'lunch_time',
        'bus',
        'marshrut',
        'stop',
        'telegram',
        'facebook',
        'youtube',
        'instagram',
        'map_link',
        'rating',
        'reviews_count',
    ];

    protected $decodeable = [
        'address',
        'work_time',
        'lunch_time',
        'bus',
        'marshrut',
        'stop',
    ];

    protected $casts = [
        'rating' => 'decimal:1',
        'reviews_count' => 'integer',
    ];
}
