<?php

namespace App\Livewire\Shop\Lists;

use App\Enums\Filters\ShopFilter;
use App\Livewire\Shop\Filters\PerPageFilter;
use App\Models\Product;
use App\Traits\WithModelsFilter;
use App\Traits\WithMultipleFilter;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Process\Pipe;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductsList extends Component
{

    use WithPagination;
    use WithoutUrlPagination;


    private array $filters = [
        'category' => [],
        'search' => '',
        'price' => [],
        'rating' => [],
        'color' => []


    ];


    private function resetFilters(): void
    {

        //dd(1);
        collect($this->filters)->each(fn($filter, $key) => session()->forget('shop:' . $key));

        session()->forget('shop:perPage');


        $this->gotoPage(1);

    }

    #[On('filters-reset')]
    public function onResetFilters(): void
    {
        $this->resetFilters();
        $this->dispatch('shop-reset-filters');
    }

    #[On('filters-updated')]
    public function onFiltersUpdated(mixed $filters): void
    {


        $key = key($filters);

        $value = $filters[$key];


        ///dd('informacion del input color ---> key '.$key .' values '.implode($value));


        session()->put('shop:' . $key, $value);
        //dd(session('shop:'.$key));
        //  ray();
        $this->gotoPage(1);

    }


    private function filters(): array
    {
        $filters = collect($this->filters)
            ->map(function ($filter, $key) {
                $value = session('shop:' . $key, $filter);

                if (is_array($value)) {
                    $value = array_map(fn($v) => is_numeric($v) ? (int)$v : $v, $value);
                }
                return $value;

            })->toArray();

        info('Filtros construidos', [$filters]);

        return $filters;
    }


    public function render(): View
    {
        return view('livewire.shop.lists.products-list', ['products' => $this->getProducts()]);
    }

    private function getProducts()
    {

        /// info('se ejecuta con el filtro price ?',[session('shop:')]);
        $query = Product::query()->with([
            'brand:id,name',
            'category:id,name',
            'color:id,name',
            'size:id,name',
            'reviews:id,product_id,rating',
        ]);
        info('estoy get productos ',[$this->filters()]);

        $query = app(Pipeline::class)
            ->send($query)
            ->through(
                collect($this->filters())
                    ->map(fn($value, $key) => ShopFilter::from($key)->create($value))
                    ->values()
                    ->all(),
            )
            ->thenReturn();

        info('search (pipeline) ', [$query->get()]);
        return $query->paginate(session(key: 'shop:perPage', default: PerPageFilter::DEFAULT_PER_PAGE));
    }


    public function mount()
    {
        $this->resetFilters();
    }


}
