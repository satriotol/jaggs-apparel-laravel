<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Home;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $social_medias = SocialMedia::all();
        $home = Home::first();

        return ResponseFormatter::success(['social_medias' => $social_medias, 'home' => $home]);
    }
}
