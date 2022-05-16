<?php

use App\Http\Controllers\BalanceController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ResetController;
use Illuminate\Support\Facades\Route;

/*
use Illuminate\Http\Request;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::post('reset', [ResetController::class, 'reset']);
Route::get('balance', [BalanceController::class, 'show']);
Route::post('event', [EventController::class, 'store']);