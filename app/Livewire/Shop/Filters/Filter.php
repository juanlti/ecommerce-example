<?php

namespace App\Livewire\Shop\Filters;

use App\Livewire\Shop\Lists\ProductsList;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Livewire\Component;
use phpDocumentor\Reflection\Types\ClassString;

abstract class Filter extends Component
{
    public string $title;
    protected string $eloquentModel;


    public function models():Collection{

        return collect();
    }

    protected function applyFilters(array $filters):void{
       // dd($filters);
        //dd("metodo de Filter");
        $this->dispatch('filters-updated',filters:$filters)->to(ProductsList::class);
    }



    public function render():View
    {
        return view('livewire.shop.filters.filter',[
            'models'=>$this->models(),
            'alias'=>Str::of(class_basename($this->eloquentModel))->lower(),
        ]);
    }
}
