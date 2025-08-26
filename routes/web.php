<?php

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
