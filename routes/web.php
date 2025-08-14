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