<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home()
    {
        $products = Product::orderBy('id','desc')->get();
        $product_categories = ProductCategory::all();
        $data = [
            'products' => $products,
            'product_categories' => $product_categories
        ];
        return ResponseFormatter::success($data, 'Sukses');
    }
}
