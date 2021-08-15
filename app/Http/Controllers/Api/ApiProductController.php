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

        // $category = $request->input('category_id');
        // $product = Product::with(['category', 'galleries', 'product_size'])->whereHas('galleries')->whereHas('product_size', function ($q) {
        //     $q->where('qty', '>', 0);
        // })->get()->groupBy('category_name')->map(function ($group) {
        //     return $group->map(function ($value) {
        //         return ["category_name" => $value->category_name, "data" => $value];
        //     });
        // });
        // if ($category) {
        //     $product = Product::with(['category', 'galleries', 'product_size'])->whereHas('galleries')->whereHas('product_size', function ($q) {
        //         $q->where('qty', '>', 0);
        //     })->where('category_id', $category)->get()->groupBy('category_name')->map(function ($group) {
        //         return $group->map(function ($value) {
        //             return ["category_name" => $value->category_name, "data" => $value];
        //         });
        //     });
        //     if ($product) {
        //         return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
        //     } else {
        //         return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        //     };
        // }
        // if ($product) {
        //     return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
        // } else {
        //     return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        // };
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
