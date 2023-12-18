<?php

use App\Http\Controllers\GoodController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/goods', [GoodController::class, 'goods'])->middleware(['auth'])->name('goods');

Route::middleware('auth')->group(function () {
    Route::get('/new-good', [GoodController::class, 'create'])->name('good.create');
    Route::get('/good/{id}', [GoodController::class, 'edit'])->name('good.edit');
    Route::patch('/good', [GoodController::class, 'update'])->name('good.update');
    Route::get('/delete-good', [GoodController::class, 'destroy'])->name('good.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
