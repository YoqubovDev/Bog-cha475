<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\DecodesHtmlEntities;

class Child extends Model
{
    use DecodesHtmlEntities;

    protected $fillable = ['name', 'image', 'group_id'];

    protected $decodeable = ['name'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function getNameAttribute($value)
    {
        return htmlspecialchars_decode((string) $value, ENT_QUOTES);
    }
}
