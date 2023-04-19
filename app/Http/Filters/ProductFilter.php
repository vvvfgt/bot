<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use JetBrains\PhpStorm\ArrayShape;

class ProductFilter extends AbstractFilter
{
    const CATEGORIES = 'categories';
    const PRICES = 'prices';
    const TAGS = 'tags';

    #[ArrayShape(
        [
            self::CATEGORIES => "array",
            self::PRICES => "array",
            self::TAGS => "array"
        ]
    )]
    protected function getCallbacks(): array
    {
        return [
            self::CATEGORIES => [$this, 'categories'],
            self::PRICES => [$this, 'prices'],
            self::TAGS => [$this, 'tags'],
        ];
    }

    protected function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }

    protected function prices(Builder $builder, $value)
    {
        $builder->whereBetween('price', $value);
    }

    protected function tags(Builder $builder, $value)
    {
        $builder->whereHas('tags', function($b) use ($value) {
            $b->whereIn('tag_id', $value);
        });
    }
}
