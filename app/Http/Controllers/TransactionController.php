<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\CreateTransactionRequest;
use App\Models\ProductSize;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product_sizes = ProductSize::all();
        return view('transaction.create', compact('product_sizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'JAGGS' . mt_rand(10000, 100000);
        $data['transaction_total'] = 0;
        $data['transaction_status'] = 'PENDING';
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

        session()->flash('success', 'Transaction Created Successfully');
        return redirect(route('transaction.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transaction_details = TransactionDetail::where('transaction_id', $transaction->id)->get();
        $price = array_sum(TransactionDetail::where('transaction_id', $transaction->id)->get()->pluck('product_price')->toArray());
        // dd($price);
        return view('transaction.show', compact('transaction', 'transaction_details', 'price'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->details()->delete();
        $transaction->delete();
        session()->flash('success', 'Transaction Deleted Successfully');
        return redirect(route('transaction.index'));
    }
}
