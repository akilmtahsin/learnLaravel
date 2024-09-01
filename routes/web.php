<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//About Route

Route::get('/about/create', [AboutController::class, 'create']);
Route::post('/about/store', [AboutController::class, 'store'])->name('about.store');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');
Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('about.update');
Route::delete('/about/delete/{id}', [AboutController::class, 'delete'])->name('about.delete');

//About Route End

//Customer Route