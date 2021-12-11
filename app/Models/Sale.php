<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'banner'];

    public function getBannerAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function deleteBanner()
    {
        Storage::disk('public')->delete($this->attributes['banner']);
    }
}
