<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Requests\QuantityCreateRequest;
use App\Models\Age;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\Quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("product.index", compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::all();
        $ages = Age::all();
        return view("product.create", compact('categories', 'ages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Product::create($data);
        session()->flash('success', 'Product Created Successfully');
        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $categories = ProductCategory::all();
        $ages = Age::all();
        $quantities = Quantity::where('product_id', $product->id)->get();
        $galleries = ProductGallery::where('product_id', $product->id)->get();
        return view('product.show', compact('product', 'categories', 'ages', 'quantities', 'galleries'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::all();
        $ages = Age::all();
        return view('product.create', compact('product', 'categories', 'ages'));
    }
    public function quantity_create(Product $product)
    {
        return view('quantity.create', compact('product'));
    }
    public function quantity_store(QuantityCreateRequest $request)
    {
        $data = $request->all();
        Quantity::create($data);
        session()->flash('success', 'Quantity Created Successfully');
        return redirect(route('product.show', $request->product_id));
    }
    public function quantity_destroy(Quantity $quantity)
    {
        $quantity->delete();
        session()->flash('success', 'Quantity Deleted Successfully');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $product->update($data);
        session()->flash('success', 'Product Updated Successfully');
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Kategori Deleted Successfully');
        return redirect(route("product.index"));
    }
}
