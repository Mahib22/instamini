<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::view('/', 'dashboard')->name('dashboard');

    Route::prefix('profile')->group(function () {
        Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('edit', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('{user}', [ProfileController::class, 'index'])->name('profile')->withoutMiddleware('auth');
    });

    Route::resource('post', PostController::class);
});

require __DIR__ . '/auth.php';
