<?php

namespace App\Traits;

use App\Livewire\Shop\Filters\Filter;
use Livewire\Attributes\On;

/**
 * @mixin Filter
 * @property array $filter
 */
trait WithSingleFilter
{
//    public array $filter = [];

    public function updatedFilter(): void
    {
      // dd("metodo de traits color selecionado ");
        $this->applyFilters($this->filter);
    }

    #[On('shop-reset-filters')]
    public function onResetFilters(): void
    {
        $this->filter = [];
    }
}
