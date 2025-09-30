<?php


use App\Livewire\AmbienteCreate;
use App\Livewire\AmbienteEdit;
use App\Livewire\AmbienteList;
use Illuminate\Support\Facades\Route;

Route::prefix('ambientes')->group(function () {
    Route::get('/index', AmbienteList::class)->name('ambientes.index');
    Route::get('/create', AmbienteCreate::class)->name('ambientes.create');
    Route::get('/{id}/edit', AmbienteEdit::class)->name('ambientes.edit');   
});

use App\Livewire\Dashboard;
use App\Livewire\SensorCreate;
use App\Livewire\SensorEdit;
use App\Livewire\SensorIndex;
use Illuminate\Support\Facades\Route;


Route::prefix('sensor')->group(function () {
    Route::get('/index', SensorIndex::class)->name('sensores.index');
    Route::get('/create', SensorCreate::class)->name('sensores.create');
    Route::get('/{id}/edit', SensorEdit::class)->name('sensores.edit');   
});

Route::get('/', Dashboard::class);


