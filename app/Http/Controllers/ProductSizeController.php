<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSizeRequest;
use App\Models\Product;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    public function create(Product $product)
    {
        $sizes = Size::all();
        $statuses = ['IN', 'OUT'];
        return view('quantity.create', compact('product', 'sizes', 'statuses'));
    }

    public function store(ProductSizeRequest $request)
    {
        $data = $request->all();
        $size = ProductSize::select('qty')->where('product_id', '1')->latest()->get();
        $qty = $request->qty;
        if ($request->status === 'IN') {
            $data['qty'] = $size[0]->toArray()['qty'] + (int)$qty;
        } else {
            $data['qty'] = $size[0]->toArray()['qty'] - (int)$qty;
        }
        ProductSize::create($data);
        session()->flash('success', 'Product Size Updated Successfully');
        return redirect(route('product.show', $request->product_id));
    }
}
