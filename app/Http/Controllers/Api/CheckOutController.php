<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Models\ProductSize;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'JAGGS' . mt_rand(10000, 100000);
        $number = $request->number;
        $country_code = '62';
        $isZero = substr($number, 0, 1);
        if ($isZero == '0') {
            $new_number = substr_replace($number, '+' . $country_code, 0, ($number[0] == '0'));
            $data['number'] = $new_number;
        } else {
            $data['number'] = $number;
        }

        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) {
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'product_size_id' => $product,
                'qty' => 1,
            ]);

            ProductSize::find($product)->decrement('qty');
        }

        $transaction->details()->saveMany($details);
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-9xwN7E-3Z97u382iMqioXTK3';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaction->uuid,
                'gross_amount' => $transaction->transaction_total,
            ),
            'customer_details' => array(
                'first_name' => $transaction->name,
                'email' => $transaction->email,
                'phone' => $transaction->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $transaction->update([
            'snaptoken' => $snapToken
        ]);
        return ResponseFormatter::success($transaction);
    }
}
