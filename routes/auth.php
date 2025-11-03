<?php

use App\Http\Controllers\Auth\AuthenticatedSignatureController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('', [RegisteredUserController::class, 'create'])
        ->name('register.create');
    Route::post('', [RegisteredUserController::class, 'store'])
        ->name('register.store');
});

Route::middleware('auth:link')->group(function () {
    Route::post('logout/{user}/{hash}', [AuthenticatedSignatureController::class, 'destroy'])
        ->name('logout');
    Route::post('log-again/{user}/{hash}', [AuthenticatedSignatureController::class, 'refresh'])
        ->name('log-again');
});
