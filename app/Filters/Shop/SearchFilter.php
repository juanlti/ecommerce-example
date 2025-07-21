<?php

namespace App\Filters\Shop;

use App\Filters\Filter;
use Closure;
use Illuminate\Database\Eloquent\Builder;

final class SearchFilter extends Filter
{


    public function handle(Builder $items, Closure $next): Builder
    {


        if (!$this->filter) {

            return $next($items);
        }

        info('search',[$this->filter]);
        //$items->where(column: 'name', operator: 'like', value: '%{$this->filter}%');
        $items->where('name', 'like', "%{$this->filter}%");
        //info('search (Despues) ',[$items]);

        return $next($items);
    }

}
