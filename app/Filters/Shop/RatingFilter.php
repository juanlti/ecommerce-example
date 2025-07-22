<?php

namespace App\Filters\Shop;

use App\Filters\Filter;
use Closure;
use Illuminate\Database\Eloquent\Builder;

final class RatingFilter extends Filter
{


    public function handle(Builder $items, Closure $next): Builder
    {
        //dd("hola");


        info('estoy en rating fliter ', [$this->filter]);


        if (!$this->filter) {


            return $next($items);
        }
        //opcion A
        //$items ->whereHas('reviews');


        /*
        //Opcion B
        $items->whereHas(
            relation: 'reviews', callback: fn($query) => $query->where('rating', '>=', $this->filter)
        );
        */

        $items->whereHas('reviews', function (Builder $query) {
            $query->where('rating', '>=', (int)$this->filter);
        });


        dd("holaaa def23f32");

        return $next($items);
    }
}
