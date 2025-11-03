<?php

use App\Http\Controllers\Game\PlayController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:link')->group(function () {
    Route::name('game.')->prefix('game')->group(function () {
        Route::get('/{user}/{hash}', [PlayController::class, 'show'])->name('index');
        Route::post('/{user}/{hash}', [PlayController::class, 'play'])->name('play');
    });
});
