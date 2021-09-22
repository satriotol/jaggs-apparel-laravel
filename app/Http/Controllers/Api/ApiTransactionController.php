<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionCollection;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ApiTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        if ($transactions) {
            return new TransactionCollection($transactions);
        } else {
            return ResponseFormatter::error(null, 'Data Transaksi tidak ada', 404);
        };
    }
    public function show($uuid)
    {
        $transactions = Transaction::firstWhere('uuid', $uuid);
        if ($transactions) {
            return new TransactionCollection($transactions);
        } else {
            return ResponseFormatter::error(null, 'Data Transaksi tidak ada', 404);
        };
    }
}
