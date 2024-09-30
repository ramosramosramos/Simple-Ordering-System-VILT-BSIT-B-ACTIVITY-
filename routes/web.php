<?php

use App\Http\Controllers\Orders\OrderController;
use Illuminate\Support\Facades\Route;


Route::resource('orders', OrderController::class);
Route::post('orders/destroyAll', [OrderController::class,'truncate'])->name('orders.truncate');
