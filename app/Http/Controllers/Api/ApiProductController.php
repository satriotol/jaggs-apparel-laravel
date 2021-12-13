<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Sale;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::whereHas('galleries')->whereHas('product_size', function ($q) {
            $q->where('qty', '>', '0');
        })->when($request->category_id, function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        })->orderBy('id', 'desc')->where('is_sale', 0)->get();
        $category_name = ProductCategory::where('id', $request->category_id)->first('name');
        if ($products) {
            return ResponseFormatter::success([
                'category_name' => $category_name,
                'products' => ProductResource::collection($products),
            ], 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
    public function indexGetAll()
    {
        $products_category = ProductCategory::with('products', 'products.galleries', 'products.product_size')
            ->whereHas('products', function ($q) {
                $q->where('is_sale', 0)->limit(3);
            })
            ->whereHas('products.galleries')
            ->whereHas('products.product_size')->get();
        if ($products_category) {
            return ResponseFormatter::success([
                'products_category' => $products_category,
            ], 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
    public function indexGetSale(Request $request)
    {
        $sale = Sale::first();
        $products = Product::whereHas('galleries')->whereHas('product_size', function ($q) {
            $q->where('qty', '>', '0');
        })->when($request->category_id, function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        })->orderBy('id', 'desc')->where('is_sale', 1)->get();
        if ($products) {
            return ResponseFormatter::success([
                'products' => ProductResource::collection($products),
                'sale' => $sale
            ], 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
    public function detail($slug)
    {
        $product = Product::with(['category', 'galleries', 'product_size'])->where('slug', $slug)->first();
        $other_products = Product::with(['category', 'galleries', 'product_size'])->whereHas('galleries')
            ->whereHas('product_size', function ($q) {
                $q->where('qty', '>', '0');
            })->orderBy('id', 'desc')->where('slug', '!=', $slug)->where('is_sale', 0)->get();
        if ($product) {
            return ResponseFormatter::success([
                'products' => $product,
                'other_products' => $other_products
            ], 'Data Product Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
}
