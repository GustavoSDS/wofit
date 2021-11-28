<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PreinscriptsController;

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('admin/dashboard');
})->name('admin');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::resource('dates', UserController::class);
    /* Routes from as inscriptos */
    // Route::resource('preinscripts', PreinscriptsController::class);
    Route::get('preinscripts', [PreinscriptsController::class, 'index'])->name('preinscripts.index');
    Route::put('preinscripts/{preinscript}', [PreinscriptsController::class, 'update'])->name('preinscripts.update');
    Route::get('preinscripts/{preinscript}', [PreinscriptsController::class, 'show'])->name('preinscripts.show');
    Route::get('preinscripts/{preinscript}/edit', [PreinscriptsController::class, 'edit'])->name('preinscripts.edit');

    /* Routes from datatables in admin */
    Route::get('dataTableUSer', [UserController::class ,'dataTable'])->name('dataTableUser');
    Route::get('dataTableInscriptos/{id}', [UserController::class ,'dataTableInscriptos'])->name('dataTableInscriptos');
    Route::get('Preinscript', [PreinscriptsController::class ,'dataTable'])->name('PreinscriptdataTable');


});
