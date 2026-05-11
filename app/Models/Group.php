<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Traits\DecodesHtmlEntities;

class Group extends Model
{
    use DecodesHtmlEntities;

    protected $fillable = [
        'name',
        'language',
        'bio',
        'image',
        'group_number',
        'result_percentage',
        'teacher_id',
        'assistant_id',
    ];

    protected $decodeable = ['name', 'bio'];

    /**
     * Asosiy tarbiyachi
     */
    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    /**
     * Yordamchi tarbiyachi
     */
    public function assistant(): BelongsTo
    {
        return $this->belongsTo(Teacher::class, 'assistant_id');
    }

    /**
     * Bu guruhga biriktirilgan barcha tarbiyachilar
     */
    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class, 'group_id');
    }

    /**
     * Guruh tarbiyalanuvchilari (bolalar)
     */
    public function students(): HasMany
    {
        return $this->hasMany(Child::class, 'group_id');
    }

    /**
     * Alias for students
     */
    public function children(): HasMany
    {
        return $this->students();
    }

    public function getNameAttribute($value)
    {
        return htmlspecialchars_decode((string) $value, ENT_QUOTES);
    }
}
