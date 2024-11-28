<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\DeleteUserController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');

    Route::get('delete-account', [DeleteUserController::class, 'show'])
                ->name('delete.account');

    Route::post('delete-account', [DeleteUserController::class, 'destroy'])
                ->name('delete.account');

    Route::get('update-password', [NewPasswordController::class, 'show'])
                ->name('password.update');

    Route::put('update-password', [NewPasswordController::class, 'update'])
                ->name('password.update');
});
