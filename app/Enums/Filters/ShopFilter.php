<?php

namespace App\Enums\Filters;

use App\Filters\Filter;
use App\Filters\Shop\CategoryFilter;
use App\Filters\Shop\ColorFilter;
use App\Filters\Shop\PriceFilter;
use App\Filters\Shop\RatingFilter;
use App\Filters\Shop\SearchFilter;



enum ShopFilter: string
{


    case Category = 'category';

    case Search = 'search';

    case Price = 'price';

    case Rating = 'rating';

    case Color = 'color';

    public function create(mixed $filter): Filter
    {


        return match ($this) {
            self::Rating => new RatingFilter($filter),
            self::Category => new CategoryFilter($filter),
            self::Search => new SearchFilter($filter),
            self::Price => new PriceFilter($filter),
            self::Color =>new ColorFilter($filter)


        };

    }


}
