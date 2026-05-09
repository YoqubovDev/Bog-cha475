<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\DecodesHtmlEntities;

class Achievement extends Model
{
    use HasFactory, DecodesHtmlEntities;

    protected $fillable = [
        'name',
        'badge',
        'description',
        'image',
        'category',
    ];

    protected $decodeable = ['name', 'description', 'category'];
}