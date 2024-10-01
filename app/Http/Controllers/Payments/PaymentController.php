<?php

namespace App\Http\Controllers\Payments;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;


class PaymentController
{


    public function store(StorePaymentRequest $request)
    {

        Payment::create($request->validated());
        return redirect()->back();
    }

}
