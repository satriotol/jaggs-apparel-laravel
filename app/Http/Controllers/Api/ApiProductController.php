<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->input('slug');
        $product = Product::with(['category', 'galleries', 'product_size'])->whereHas('galleries')->whereHas('product_size', function ($q) {
            $q->where('qty', '>', 0);
        })->get();
        if ($slug) {
            $product = Product::with(['category', 'galleries', 'product_size'])->whereHas('galleries')->whereHas('product_size')->where('slug', $slug)->first();
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
    // public function detail($slug)
    // {
    //     $product = Product::with(['category', 'galleries', 'product_size'])->where('slug', $slug)->first();
    //     if ($product) {
    //         return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
    //     } else {
    //         return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
    //     };
    // }
}
