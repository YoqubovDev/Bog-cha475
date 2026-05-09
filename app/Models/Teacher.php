<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Traits\DecodesHtmlEntities;

class Teacher extends Model
{
    use DecodesHtmlEntities;

    protected $fillable = ['name', 'image', 'bio', 'category_id'];

    protected $decodeable = ['name', 'bio'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function primaryGroups(): HasMany
    {
        return $this->hasMany(Group::class, 'teacher_id');
    }

    public function assistantGroups(): HasMany
    {
        return $this->hasMany(Group::class, 'assistant_id');
    }
}
