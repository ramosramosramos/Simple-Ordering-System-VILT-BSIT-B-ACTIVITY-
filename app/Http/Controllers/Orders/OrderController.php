<?php

namespace App\Http\Controllers\Orders;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\Orders\OrderResource;
use App\Services\OrderCalculator;

class OrderController
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderCalculator $service)
    {
        $orders = Order::query()
        ->select(['id', 'name', 'quantity', 'price', 'total'])
        ->latest()->get();
        $grand_total = $service->getGrandTotal($orders);


        return inertia('Orders/Home', [
            'orders' => OrderResource::collection($orders),
            'grand_total' => $grand_total,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        Order::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();
    }

    public function truncate()
    {
        Order::truncate();

        return redirect()->back();

    }
}
