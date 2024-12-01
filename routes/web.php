<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Finance\CurrencyController;
use App\Http\Controllers\Finance\GoldController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/favorite-currencies', [CurrencyController::class, 'index'])
        ->name('currencies');

    Route::get('/dashboard/search', [CurrencyController::class, 'show'])
        ->name('currencies.search');

    Route::delete('/favorite-currencies', [CurrencyController::class, 'destroy'])
        ->name('currencies.destroy');

    Route::post('/favorite-currencies/', [CurrencyController::class, 'store'])
        ->name('currencies.store');

    Route::get("/gold", [GoldController::class, 'index'])
        ->name('gold');
});

require __DIR__.'/auth.php';
