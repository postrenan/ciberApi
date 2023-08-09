<?php

use App\Http\Controllers\BrandController\BrandListController;
use App\Http\Controllers\BrandController\BrandManagerController;
use App\Http\Controllers\CarController\CarListController;
use App\Http\Controllers\CarController\CarManagerController;
use App\Http\Controllers\DriverCarController\DriverCarListController;
use App\Http\Controllers\DriverCarController\DriverCarManagerController;
use App\Http\Controllers\DriverController\DriverListController;
use App\Http\Controllers\DriverController\DriverManagerController;
use Illuminate\Support\Facades\Route;

Route::prefix('car')->group(function () {
    Route::get('', [CarListController::class, 'index']);
    Route::get('/{id}', [CarListController::class, 'show']);
    Route::post('', [CarManagerController::class, 'post']);
    Route::patch('/{id}', [CarManagerController::class, 'patch']);
    Route::delete('/{id}', [CarManagerController::class, 'delete']);
});

Route::prefix('driver')->group(function () {
    Route::get('', [DriverListController::class, 'index']);
    Route::get('/{id}', [DriverListController::class, 'show']);
    Route::post('', [DriverManagerController::class, 'post']);
    Route::patch('/{id}', [DriverManagerController::class, 'patch']);
    Route::delete('/{id}', [DriverManagerController::class, 'delete']);
});

Route::prefix('brand')->group(function () {
    Route::get('', [BrandListController::class, 'index']);
    Route::get('/{id}', [BrandListController::class, 'show']);
    Route::post('', [BrandManagerController::class, 'post']);
    Route::patch('/{id}', [BrandManagerController::class, 'patch']);
    Route::delete('/{id}', [BrandManagerController::class, 'delete']);
});

Route::prefix('junction')->group(function (){
    Route::delete('/{car_id}/{driver_id}', [DriverCarManagerController::class, 'delete']);
    Route::post('', [DriverCarManagerController::class, 'post']);
    Route::get('', [DriverCarListController::class, 'index']);
});


Route::any('{url?}/{sub_url?}', function (){
   return response()->json([
       'message' => 'page not found'], 404
   );
});

