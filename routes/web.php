<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\PageController;
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
    Route::get('/', [PageController::class, 'dashboard'])->name('dashboard');

    Route::resource('challenge', ChallengeController::class);
    Route::prefix('challenge')->group(function () {
        Route::post('/{challenge}/accept', [ChallengeController::class, 'accept'])->name('challenge.accept');
        Route::post('/{challenge}/complete', [ChallengeController::class, 'complete'])->name('challenge.complete');
        Route::post('/{challenge}/give-up', [ChallengeController::class, 'giveUp'])->name('challenge.give_up');
    });
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'create']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
