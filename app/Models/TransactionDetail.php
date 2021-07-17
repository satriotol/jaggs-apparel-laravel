<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $tables = 'transaction_details';
    protected $fillable = ['product_size_id', 'transaction_id', 'qty'];
}
