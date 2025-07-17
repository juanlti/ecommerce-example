<?php

namespace App\Livewire\Shop\Pages;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\View\View;
class ShopPage extends Component
{

    public function resetFilters():void{

    }
    public function render():View
    {
        $product= Product::first();
        return view('livewire.shop.pages.shop-page',[
            'product'=>$product
        ]);
    }
}
