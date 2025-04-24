<?php

namespace App\Livewire\Shop\Lists;

use Illuminate\View\View;
use Livewire\Component;

class ProductsList extends Component
{
    public function render():View
    {
        return view('livewire.shop.lists.products-list');
    }
}
