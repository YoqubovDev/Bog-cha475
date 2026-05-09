<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Traits\DecodesHtmlEntities;

class News extends Model
{
    use HasFactory, DecodesHtmlEntities;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'published_at',
    ];

    protected $decodeable = [
        'title',
        'content',
        'excerpt',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Auto-generate slug from title when creating/updating if not provided.
     */
    protected static function booted()
    {
        static::creating(function (News $model) {
            if (empty($model->slug) && $model->title) {
                $model->slug = Str::slug($model->title);
            }
        });

        static::updating(function (News $model) {
            if (empty($model->slug) && $model->title) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    /**
     * Return public URL for the image (or null).
     */
    public function getImageUrlAttribute(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return asset('storage/' . $this->image);
    }

    /**
     * Use slug for route model binding by default.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
