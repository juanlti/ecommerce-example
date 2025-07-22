<?php

namespace App\Livewire\Shop\Filters;

use App\Models\Color;
use App\Traits\WithModelsFilter;
use App\Traits\WithMultipleFilter;


class ColorFilter extends Filter
{
    use WithModelsFilter;
    use WithMultipleFilter;

  public string $title='Colores';
  protected string $eloquentModel=Color::class;



}
