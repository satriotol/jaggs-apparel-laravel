<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Home extends Model
{
    use HasFactory;
    protected $fillable = ['background', 'logo', 'title'];

    public function getBackgroundAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function getLogoAttribute($value)
    {
        return url('storage/' . $value);
    }
    public function deleteBackground()
    {
        Storage::disk('public')->delete($this->attributes['background']);
    }
    public function deleteLogo()
    {
        Storage::disk('public')->delete($this->attributes['logo']);
    }
}
