<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiskusiController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('diskusi', DiskusiController::class)
    ->only(['index', 'store', 'edit', 'update', 'destroy'])
    ->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
