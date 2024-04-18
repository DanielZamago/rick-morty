<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonajeController;

Route::controller(PersonajeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/personajes', 'showAll');
    Route::get('/personajes/guardados', 'showSaved');
    Route::post('/personajes/buscar', 'search');
});