<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ApiProductCategoryController extends Controller
{
    public function index()
    {
        $product_category = ProductCategory::whereHas('products', function ($q) {
            $q->where('is_sale', 0)->whereHas('galleries')->whereHas('product_size', function ($sq) {
                $sq->where('qty', '>', '0');
            });
        })->get();
        if ($product_category) {
            return ResponseFormatter::success($product_category, 'Data Product Category Berhasil Diambil');
        } else {
            return ResponseFormatter::error(null, 'Data Product Tidak Ada', 404);
        }
    }
}
