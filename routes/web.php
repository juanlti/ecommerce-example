<?php

use Illuminate\Support\Facades\Route;
use \App\Livewire\Shop\Pages\ShopPage;

Route::get('/dashboard', ShopPage::class)->name('dashboard');
