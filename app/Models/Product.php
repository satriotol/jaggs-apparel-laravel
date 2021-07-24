<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";
    protected $fillable = ['slug', 'name', 'description', 'price', 'category_id', 'weight'];
    protected $appends = ['category_name'];



    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
    public function product_size()
    {
        return $this->hasMany(ProductSize::class, 'product_id', 'id');
    }
    public function getCategoryNameAttribute()
    {
        return $this->category->name;
    }
}
