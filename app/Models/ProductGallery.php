<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductGallery extends Model
{
    use HasFactory;
    protected $table = 'product_galleries';
    protected $fillable = ['product_id', 'is_default', 'photo'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }

    public function deletePhoto()
    {
        Storage::disk('public')->delete($this->attributes['photo']);
    }
}
