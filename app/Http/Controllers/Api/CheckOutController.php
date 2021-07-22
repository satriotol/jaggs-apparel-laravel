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

        return ResponseFormatter::success($transaction);
    }
}
