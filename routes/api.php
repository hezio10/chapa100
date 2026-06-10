<?php

use App\Http\Controllers\PrincingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pricing'], function () {
    Route::post('/create', [PrincingController::class, 'createPricing']);
});
