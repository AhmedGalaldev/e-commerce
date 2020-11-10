<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentPage(Request $request)
    {
        $payment_info = $request->session()->get('payment_info');


        if ($payment_info['status'] == 'on_hold') {

            return view('payments.paymentPage', ['payment_info' => $payment_info]);
        } else {
            return redirect()->route('allProducts');
        }
    }
}
