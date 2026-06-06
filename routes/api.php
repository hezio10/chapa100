<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/pricings/create', [PricingController::class, 'create']);
Route::post('/pricings', [PricingController::class, 'store']);

