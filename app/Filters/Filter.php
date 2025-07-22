<?php

namespace App\Filters;

use Closure;
use Illuminate\Database\Eloquent\Builder;


abstract class Filter
{

    public function __construct(protected mixed $filter)
    {
        //dd('RatingFilter instanciado con:', $filter);
    }

    abstract public function handle(Builder $items, Closure $next): Builder;


}
