<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::whereHas('galleries')->whereHas('product_size', function ($q) {
            $q->where('qty', '>', '0');
        })->when($request->category_id, function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        })->orderBy('id', 'desc')->get();
        if ($products) {
            return ResponseFormatter::success(new ProductCollection($products), 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };

    }
    public function detail($slug)
    {
        $product = Product::with(['category', 'galleries', 'product_size'])->where('slug', $slug)->first();
        if ($product) {
            return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
}
