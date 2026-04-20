<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = ['name', 'image', 'group_id'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
