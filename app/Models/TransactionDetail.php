<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $tables = 'transaction_details';
    protected $fillable = ['product_size_id', 'transaction_id', 'qty'];
    protected $appends = ['product_price'];

    public function product_size()
    {
        return $this->belongsTo(ProductSize::class, 'product_size_id', 'id');
    }
    public function getProductPriceAttribute()
    {
        $product_price = $this->product_size->product?->price;
        $product_qty = $this->qty;
        $total = $product_price * $product_qty;
        return $total;
    }
}
