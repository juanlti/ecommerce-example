<?php

namespace App\Livewire\Shop\Filters;

use App\Traits\WithSingleFilter;
use Illuminate\View\View;
use Livewire\Component;

class SearchFilter extends Filter
{

    use WithSingleFilter;

    public array $filter = [
        'search' => '',
    ];

    public function render(): View
    {
        return view('livewire.shop.filters.search-filter');
    }

}
