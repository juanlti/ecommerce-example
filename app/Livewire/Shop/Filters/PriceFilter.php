<?php

namespace App\Livewire\Shop\Filters;

use App\Traits\WithSingleFilter;
use Illuminate\View\View;


class PriceFilter extends Filter
{

    use WithSingleFilter;

    public string $title='Precio';

    public array $filter = [
        'price' => [
            'min' => 0,
            'max' => 0,


        ],

    ];

    public function render(): View
    {
        return view('livewire.shop.filters.price-filter');
    }
}
