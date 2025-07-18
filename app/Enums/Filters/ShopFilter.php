<?php

namespace App\Enums\Filters;

use App\Filters\Shop\CategoryFilter;
use App\Filters\Shop\Filter;


enum ShopFilter: string
{


    case Category = 'category';

    public function create(mixed $filter): Filter
    {

        return match ($this) {
            self::Category => new CategoryFilter($filter),
        };

    }


}
