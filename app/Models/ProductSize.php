<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    protected $fillable = ['product_id', 'size_id', 'qty', 'status'];
    protected $appends = ['size_name'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }
    public function getSizeNameAttribute()
    {
        return $this->size->name;
    }
}
