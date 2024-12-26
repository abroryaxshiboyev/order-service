<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\StatsController;
use Illuminate\Support\Facades\Route;

Route::post('orders',[OrderController::class,'store']);
Route::get('/stats/popular-products', [StatsController::class, 'popularProducts']);

