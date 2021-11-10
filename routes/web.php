<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');
Route::post('/pre-inscripciones', [HomeController::class ,'preinscripciones'])->name('preInscripciones.post');


Route::get('/suggestions', [HomeController::class, 'suggestions'])->name('suggestions');
Route::post('/suggestions', [HomeController::class, 'post'])->name('suggestions.post');
