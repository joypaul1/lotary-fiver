<?php

namespace App\Traits;

use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::saving(function ($model) {
            $separator = '-';
            if (get_class($model) == SubCategory::class) {
                $model->slug = static::slug($model->category->title . $separator . $model->title);
            } else if (get_class($model) == Item::class) {
                $model->slug = static::slug(
                    $model->name . $separator
                    . $model->origin_id
                    . $model->brand_id
                    . $model->category_id
                );
            } else if ($model->title) {
                $model->slug = static::slug($model->title);
            } else if ($model->name) {
                $model->slug = static::slug($model->name);
            }
        });
    }

    private static function slug($string, $separator = '-')
    {
        $slug = mb_strtolower(
            preg_replace('/([?]|\p{P}|\s)+/u', $separator, $string)
        );
        return trim($slug, $separator);
    }
}
