<?php

use App\Http\Controllers\BusLineController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PrincingController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ServiceTypeController;
use App\Http\Controllers\TransportTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pricing'], function () {
    Route::post('/create', [PrincingController::class, 'createPricing']);
});

Route::group(['prefix' => 'service-types'], function () {
    Route::get('/', [ServiceTypeController::class, 'index']);
    Route::post('/', [ServiceTypeController::class, 'store']);
    Route::get('/{serviceType}', [ServiceTypeController::class, 'show']);
    Route::put('/{serviceType}', [ServiceTypeController::class, 'update']);
    Route::delete('/{serviceType}', [ServiceTypeController::class, 'destroy']);
});

Route::group(['prefix' => 'provinces'], function () {
    Route::get('/', [ProvinceController::class, 'index']);
    Route::post('/', [ProvinceController::class, 'store']);
    Route::get('/{province}', [ProvinceController::class, 'show']);
    Route::put('/{province}', [ProvinceController::class, 'update']);
    Route::delete('/{province}', [ProvinceController::class, 'destroy']);
});

Route::group(['prefix' => 'locations'], function () {
    Route::get('/', [LocationController::class, 'index']);
    Route::post('/', [LocationController::class, 'store']);
    Route::get('/{location}', [LocationController::class, 'show']);
    Route::put('/{location}', [LocationController::class, 'update']);
    Route::delete('/{location}', [LocationController::class, 'destroy']);
});

Route::group(['prefix' => 'bus-lines'], function () {
    Route::get('/', [BusLineController::class, 'index']);
    Route::post('/', [BusLineController::class, 'store']);
    Route::get('/filter', [BusLineController::class, 'getByOrigninAndDestination']);
    Route::get('/{route}', [BusLineController::class, 'show']);
    Route::put('/{route}', [BusLineController::class, 'update']);
    Route::delete('/{route}', [BusLineController::class, 'destroy']);
});

Route::group(['prefix' => 'transport-types'], function () {
    Route::get('/', [TransportTypeController::class, 'index']);
    Route::post('/', [TransportTypeController::class, 'store']);
    Route::get('/{transportType}', [TransportTypeController::class, 'show']);
    Route::get('/{id}/bus-lines', [TransportTypeController::class, 'getBuslinesByTransporttype']);
    Route::put('/{transportType}', [TransportTypeController::class, 'update']);
    Route::delete('/{transportType}', [TransportTypeController::class, 'destroy']);
});
