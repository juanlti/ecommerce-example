<?php

namespace App\Livewire\Shop\Filters;


use App\Models\Category;
use App\Traits\WithModelsFilter;
use App\Traits\WithMultipleFilter;

class CategoryFilter extends Filter
{
    use WithModelsFilter;
    use WithMultipleFilter;

    public string $title = 'Categorias';

    protected string $eloquentModel = Category::class;

}
