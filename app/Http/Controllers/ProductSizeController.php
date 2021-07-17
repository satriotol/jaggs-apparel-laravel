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
        $product_size = ProductSize::where('product_id', $request->product_id)->where('size_id', $request->size_id)->get();

        if ($product_size->count() > 0) {
            $size = ProductSize::select('qty')->where('product_id', $request->product_id)->where('size_id', $request->size_id)->latest()->get();
            $qty = $request->qty;
            $product_size_delete = ProductSize::where('product_id', $request->product_id)->where('size_id', $request->size_id)->firstOrFail();
            if ($request->status === 'IN') {
                $data['qty'] = $size[0]->toArray()['qty'] + (int)$qty;
                $product_size_delete->delete();
            } else {
                $data['qty'] = $size[0]->toArray()['qty'] - (int)$qty;
                $product_size_delete->delete();
            }
        }
        ProductSize::create($data);
        session()->flash('success', 'Product Stock Updated Successfully');
        return redirect(route('product.show', $request->product_id));
    }
}
