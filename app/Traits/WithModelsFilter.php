<?php

namespace App\Traits;

use App\Livewire\Shop\Filters\Filter;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;

/**
 *
 * @mixin Filter
 */
trait WithModelsFilter
{


    public function models(): Collection
    {
        return app($this->eloquentModel)->query()
            ->withCount('products')
            ->get();
    }



}
