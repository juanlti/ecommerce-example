<?php

namespace App\Enums\Filters;

use App\Filters\Filter;
use App\Filters\Shop\CategoryFilter;
use App\Filters\Shop\PriceFilter;
use App\Filters\Shop\SearchFilter;


enum ShopFilter: string
{


    case Category = 'category';

    case Search = 'search';

    case Price = 'price';

    public function create(mixed $filter): Filter
    {


        return match ($this) {
            self::Category => new CategoryFilter($filter),
            self::Search => new SearchFilter($filter),
            self::Price => new PriceFilter($filter),
        };

    }


}
