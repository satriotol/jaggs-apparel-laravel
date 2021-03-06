<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $tables = 'transactions';
    protected $fillable = ['uuid', 'email', 'number', 'address', 'transaction_total', 'transaction_status', 'name', 'province', 'city', 'courier', 'courier_price', 'snaptoken'];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }
}
