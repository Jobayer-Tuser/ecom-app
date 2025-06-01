<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable(): void
    {
        static::saving(static function (self $model) {
            $slugColumn = $model->slugColumn ?? 'slug';
            $model->{$slugColumn} = Str::slug($model->{$model->sluggable});
        });
    }
}
