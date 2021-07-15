<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";
    protected $fillable = ['slug', 'name', 'description', 'price', 'category_id', 'age_id', 'weight'];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
    public function age()
    {
        return $this->belongsTo(Age::class, 'age_id', 'id');
    }
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
    public function quantities()
    {
        return $this->hasMany(Quantity::class, 'product_id', 'id');
    }
}
