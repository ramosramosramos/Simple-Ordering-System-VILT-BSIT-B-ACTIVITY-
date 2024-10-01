<?php

use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\Payments\PaymentController;
use Illuminate\Support\Facades\Route;


Route::resource('orders', OrderController::class);
Route::post('orders/destroyAll', [OrderController::class,'truncate'])->name('orders.truncate');

Route::post('payments/cash', [PaymentController::class,'store'])->name('payments.store');
