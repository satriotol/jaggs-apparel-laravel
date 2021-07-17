<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionDetail\CreateTransactionDetailRequest;
use App\Models\ProductSize;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function create(Transaction $transaction)
    {
        $product_sizes = ProductSize::all();
        return view('transactiondetail.create', compact('transaction', 'product_sizes'));
    }
    public function store(CreateTransactionDetailRequest $request, Transaction $transaction)
    {
        $data = $request->all();
        $data['transaction_id'] = $transaction->id;

        TransactionDetail::create($data);

        session()->flash('success', 'Transaction Detail Created Successfully');
        return redirect(route('transaction.show', $transaction->id));
    }
}
