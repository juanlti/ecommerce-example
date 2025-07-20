<?php

namespace App\Livewire\Shop\Pages;

use App\Livewire\Shop\Lists\ProductsList;
use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\View\View;

class ShopPage extends Component
{

    public function resetFilters(): void
    {
        $this->dispatch('filters-reset')->to(ProductsList::class);

    }

    public function render(): View
    {

        return view('livewire.shop.pages.shop-page');
    }
}
