<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Shop\Pages\ShopPage;

Route::get('/productos', ShopPage::class)->name('shop-page');
