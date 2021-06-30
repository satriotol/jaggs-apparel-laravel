<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\API\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function index()
    {
        $product = Product::with(['category', 'age', 'galleries'])->get();
        if ($product) {
            return ResponseFormatter::success($product, 'Data Product Berhasil Diambil');
            # code...
        } else {
            return ResponseFormatter::error(null, 'Data produk tidak ada', 404);
        };
    }
}
