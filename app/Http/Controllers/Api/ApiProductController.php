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
        $category = $request->input('category_id');

        $products = Product::whereHas('galleries')->whereHas('product_size', function ($q) {
            $q->where('qty', '>', '0');
        })->orderBy('id', 'desc')->get();
        if ($category) {
            $products = Product::whereHas('galleries')->whereHas('product_size', function ($q) {
                $q->where('qty', '>', '0');
            })->where('category_id', $category)->orderBy('id', 'desc')->get();
            return new ProductCollection($products);
        }

        return new ProductCollection($products);
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
