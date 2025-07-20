<?php

namespace App\Livewire\Shop\Filters;

use App\Traits\WithSingleFilter;
use Illuminate\View\View;
use Livewire\Attributes\Modelable;
use Livewire\Component;

class PerPageFilter extends Filter
{
    use WithSingleFilter;

    const DEFAULT_PER_PAGE = 1;


    public array $filter = [
        'perPage' => self::DEFAULT_PER_PAGE
    ];

    public function render(): View
    {

        return view('livewire.shop.filters.per-page-filter', ['options' => [4, 6, 8, 12, 16, 20]]);
    }

}
