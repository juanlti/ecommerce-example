<?php

namespace App\Livewire\Shop\Lists;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductsList extends Component
{

    use WithPagination;
    use WithoutUrlPagination;


    private array $filters = [
        'category' => [],
    ];


    private function resetFilters(): void
    {

        //dd(1);
        collect($this->filters)->each(fn($filter, $key) => session()->forget('shop:' . $key));

        session()->forget('shop:perPage');

        $this->gotoPage(1);

    }

    private function filters(): array
    {

        return collect($this->filters)->map(fn($filter, $key) => session(key: 'shop' . $key, default: $filter))->toArray();
    }

    public function render(): View
    {
        return view('livewire.shop.lists.products-list',['products'=>$this->getProducts()]);
    }

    private function getProducts()
    {
        // 1. Habilitás el log de consultas
      //  \DB::enableQueryLog();

        // 2. Ejecutás tu consulta (con eager loading y paginación)
        $products = Product::query()->with([
            'brand:id,name',
            'category:id,name',
            'color:id,name',
            'size:id,name',
            'reviews:id,product_id,rating',
        ])->paginate(session(key: 'perPage', default: 4));

        // 3. Mostrás el log de las consultas realizadas
        //dd(DB::getQueryLog());

        // 4. (Opcionalmente, si querés devolver los productos en vez de cortar con `dd`)
        return $products;
    }


    public function mount()
    {
        $this->resetFilters();
    }


}
