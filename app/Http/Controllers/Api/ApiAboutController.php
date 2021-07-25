<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\AboutCollection;
use App\Http\Resources\AboutResource;
use App\Models\About;
use Illuminate\Http\Request;

class ApiAboutController extends Controller
{
    public function index()
    {
        $about = About::where('id', 1)->get();
        return new AboutCollection($about);
    }
}
