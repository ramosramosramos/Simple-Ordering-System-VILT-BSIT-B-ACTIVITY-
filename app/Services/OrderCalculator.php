<?php

namespace App\Services;

class OrderCalculator
{
    /**
     * Create a new class instance.
     */
    public function getGrandTotal($orders)
    {

        $grand_total = 0;
        foreach ($orders as $order) {
            $grand_total += $order->total;
        }

        return $grand_total;

    }
}
