<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\Home;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $social_medias = SocialMedia::all();
        $home = Home::first();

        return ResponseFormatter::success(['social_medias' => $social_medias, 'home' => $home]);
    }
    public function send_email()
    {
        Mail::to("satriotol69@mmail.com")->send(new OrderShipped);
    }
}
