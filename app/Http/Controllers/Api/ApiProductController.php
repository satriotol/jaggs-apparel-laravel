<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->input('slug');
        $product = Product::with(['category', 'age', 'galleries', 'quantities'])->whereHas('galleries')->get();
        if ($slug) {
            $product = Product::with(['category', 'age', 'galleries', 'quantities'])->whereHas('galleries')->where('slug', $slug)->first();
            if ($product) {
                return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
            } else {
                return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
            };
        }
        if ($product) {
            return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
    public function detail($slug)
    {
        $product = Product::with(['category', 'age', 'galleries', 'quantities'])->where('slug', $slug)->first();
        if ($product) {
            return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
}
