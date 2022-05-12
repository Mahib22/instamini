<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UpdateEmailController;
use App\Http\Controllers\UpdatePasswordController;
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

Route::get('@{username}', [ProfileController::class, 'index'])->name('profile');

Route::get('search', [SearchController::class, 'index'])->name('search');

Route::middleware('auth')->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::resource('post', PostController::class);

    Route::get('/follow/{user_id}', [ProfileController::class, 'follow'])->name('follow');
    Route::get('/like/{post_id}', [LikeController::class, 'toggle'])->name('like');

    Route::prefix('profile')->group(function () {
        Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('edit', [ProfileController::class, 'update'])->name('profile.update');

        Route::get('password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
        Route::put('password/edit', [UpdatePasswordController::class, 'update']);

        Route::get('email/edit', [UpdateEmailController::class, 'edit'])->name('email.edit');
        Route::put('email/edit', [UpdateEmailController::class, 'update']);
    });
});

require __DIR__ . '/auth.php';
