<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeveloperController;


Route::prefix('developer')->group(function () {
    Route::get('/{developer}/edit', [DeveloperController::class, 'edit'])->name('developer.edit');
    Route::put('/{developer}', [DeveloperController::class, 'update'])->name('developer.update');
    Route::delete('/{developer}', [DeveloperController::class, 'destroy'])->name('developer.destroy');
});
Route::get('/create', [DeveloperController::class, 'create'])->name('developer.create');
Route::post('/store', [DeveloperController::class, 'store'])->name('developer.store');
Route::get('/', [DeveloperController::class, 'index'])->name('developer.index');
