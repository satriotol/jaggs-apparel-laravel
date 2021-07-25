<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class ApiAboutController extends Controller
{
    public function index()
    {
        $about = About::where('id', 1)->get();
        if ($about) {
            return ResponseFormatter::success($about, 'Data About Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data About Tidak Ada', 404);
        }
    }
}
