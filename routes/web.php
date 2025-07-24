<?php

use App\Livewire\ShowDeputadoDespesas;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/deputado/{deputado}/despesas', ShowDeputadoDespesas::class)
    ->name('deputado.despesas');
