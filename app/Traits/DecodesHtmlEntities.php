<?php

namespace App\Traits;

trait DecodesHtmlEntities
{
    public static function bootDecodesHtmlEntities()
    {
        static::saving(function ($model) {
            // Get fields to decode from the model's $decodeable property
            $fields = property_exists($model, 'decodeable') ? $model->decodeable : [];
            
            foreach ($fields as $field) {
                if (isset($model->attributes[$field])) {
                    $model->attributes[$field] = htmlspecialchars_decode($model->attributes[$field], ENT_QUOTES);
                }
            }
        });
    }
}
