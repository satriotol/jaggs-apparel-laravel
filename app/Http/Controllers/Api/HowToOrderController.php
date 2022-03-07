<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HowToOrder;
use Illuminate\Http\Request;

class HowToOrderController extends Controller
{
    public function index()
    {
        $how_to_order = HowToOrder::first();
        return ResponseFormatter::success($how_to_order, 'Data How To Order Berhasil Diambil');
    }
}
