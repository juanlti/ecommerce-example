<?php

namespace App\Filters\Shop;

use App\Filters\Filter;
use Closure;
use Illuminate\Database\Eloquent\Builder;


final class PriceFilter extends Filter
{


    public function handle(Builder $items, Closure $next): Builder
    {


        if (!$this->filter) {
            return ($items);
        }


        $min = $this->filter['min'] ?? 0;
        $max = $this->filter['max'] ?? 0;

        if ($min && $max) {
            $items->WhereBetween('price', [$min, $max]);

        } else if ($min) {
            $items->Where('price', '>=', $min);
        } else {
            $items->Where('price', '<=', $max);
        }


        return $next($items);
    }
}


