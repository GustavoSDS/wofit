<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');//Route home of page

Route::post('/pre-inscripciones', [HomeController::class ,'preregistration'])->name('preregistration.post');

