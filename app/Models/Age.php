<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    use HasFactory;

    protected $table = 'ages';
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'age_id', 'id');
    }
}
