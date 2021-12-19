<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RefundPolicy;
use Illuminate\Http\Request;

class RefundPolicyController extends Controller
{
    public function index()
    {
        $refund_policies = RefundPolicy::all();
        return ResponseFormatter::success($refund_policies, 'Data Refund Policy Berhasil Diambil');
    }
}
