<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Traits\DecodesHtmlEntities;

class Category extends Model
{
    use DecodesHtmlEntities;

    protected $fillable = [
        'category',
    ];

    protected $decodeable = ['category'];

    /**
     * Bu kategoriyaga tegishli barcha tarbiyachilar
     */
    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class, 'category_id');
    }
    public function home(): HasMany
    {
        return $this->hasMany(HomeSlider::class, 'category_id');
    }
}
