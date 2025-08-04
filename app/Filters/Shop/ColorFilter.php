<?php

namespace App\Filters\Shop;

use App\Filters\Filter;
use Closure;
use Illuminate\Database\Eloquent\Builder;

final class ColorFilter extends Filter
{


    public function handle(Builder $items, Closure $next): Builder
    {
        //dd("estoy en colorFilter");
        info('Valor recibido en ColorFilter', ['filter' => $this->filter]);

        if (!$this->filter) {
            return ($items);

        }

        info('Aplicando filtro por color', ['color_id' => $this->filter]);
        $items->whereIn('color_id', $this->filter);

        return $next($items);

    }
}
