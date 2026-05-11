<?php

namespace App\Traits;

trait DecodesHtmlEntities
{
    public static function bootDecodesHtmlEntities()
    {
        static::saving(function ($model) {
            $fields = property_exists($model, 'decodeable') ? $model->decodeable : [];
            foreach ($fields as $field) {
                if (isset($model->attributes[$field])) {
                    $model->attributes[$field] = htmlspecialchars_decode((string) $model->attributes[$field], ENT_QUOTES);
                }
            }
        });

        static::retrieved(function ($model) {
            $fields = property_exists($model, 'decodeable') ? $model->decodeable : [];
            foreach ($fields as $field) {
                if (isset($model->attributes[$field])) {
                    $model->attributes[$field] = htmlspecialchars_decode((string) $model->attributes[$field], ENT_QUOTES);
                }
            }
        });
    }
}
