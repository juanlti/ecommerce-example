<?php

namespace App\Filters\Shop;

use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

final class CategoryFilter extends Filter
{


    public function handle(Builder $items, Closure $next): Builder
    {


        if (!$this->filter) {

            return $next($items);
        }

        $items->whereIn('category_id', $this->filter);
        //dd($items);
        return $next($items);
    }
}
