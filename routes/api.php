<?php

use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SensorController;
use App\Livewire\Dispositivo\DispositivoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('registro', [RegistroController::class, 'store']);

Route::get('sensor', [SensorController::class, 'show']);

Route::get('sensor/update', [SensorController::class, 'update']);

Route::get('sensor/findbyCod', [DispositivoList::class, '']);
