<?php

namespace App\Filters\Shop;

use Closure;
use Illuminate\Database\Eloquent\Builder;


abstract class Filter
{

    public function __construct(protected mixed $filter)
    {
    }

    abstract public function handle(Builder $items, Closure $next): Builder;


}
