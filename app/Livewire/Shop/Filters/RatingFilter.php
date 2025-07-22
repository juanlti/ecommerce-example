<?php

namespace App\Livewire\Shop\Filters;

use App\Traits\WithSingleFilter;
use Illuminate\View\View;

class RatingFilter extends Filter
{

    use WithSingleFilter;

    public string $title = 'Valoraciones';
    public array $filter = [
        'rating' => null,
    ];

    public function render():View
    {
        return view('livewire.shop.filters.rating-filter', [
            'options' => [
                '5' => '5 estrellas',
                '4' => '4 estrellas o mas',
                '3' => '3 estrellas o mas',
                '2' => '2 estrellas o mas',
                '1' => '1 estrellas o mas',
            ]
        ]);
    }
}
