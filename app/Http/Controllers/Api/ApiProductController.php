<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSize;
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
        $products = Product::with('galleries')
            ->whereHas('galleries')->whereHas('product_size', function ($q) {
                $q->where('qty', '>', '0');
            })->orderBy('id', 'desc')->get()->groupBy('category.name');
        if ($products) {
            return ResponseFormatter::success([
                'products' => $products,
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
        $product = Product::with(['category', 'galleries', 'product_size' => function ($q){
            $q->where('qty', '>', 0);
        }])->where('slug', $slug)->first();
        // $product_size = ProductSize::where('product_id', $product->id)->where('qty', '>', '0')->get();
        $other_products = Product::with(['category', 'galleries', 'product_size'])->whereHas('galleries')
            ->whereHas('product_size', function ($q) {
                $q->where('qty', '>', '0');
            })->where('category_id', $product->category_id)->orderBy('id', 'desc')->where('slug', '!=', $slug)->get()->take(4);
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
