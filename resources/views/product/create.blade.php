@extends('layouts.main')
@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Product Form</h2>
        </div>
        @include('partials.success')
        @include('partials.error')
        <div class="card-body">
            <form
                action="@isset($product) {{ route('product.update', $product->id) }} @endisset @empty($product) {{ route('product.store') }} @endempty"
                method="POST">
                @csrf
                @if (isset($product))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label for="exampleFormControlInput1">Product Name</label>
                    <input type="text" class="form-control" name="name" required
                        value="{{ isset($product) ? $product->name : '' }}" id="exampleFormControlInput1"
                        placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" required name="description" id="exampleFormControlTextarea1"
                        rows="3">{{ isset($product) ? $product->description : '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Weight</label>
                    <input type="number" required class="form-control" name="weight"
                        value="{{ isset($product) ? $product->weight : '' }}">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect12">Category</label>
                    <select class="form-control" id="exampleFormControlSelect12" required name="category_id">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                @isset($product) @if ($category->id === $product->category_id) selected @endif
                            @endisset>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group d-none">
                <label>Is Sale ?</label>
                <select name="is_sale" class="form-control" required>
                    <option value="0"
                        @if (isset($product)) @if (0 === $product->is_sale)
                        selected @endif
                        @endif>No</option>
                    <option value="1"
                        @if (isset($product)) @if (1 === $product->is_sale)
                        selected @endif
                        @endif>Yes</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Price</label>
                <input type="number" class="form-control" required name="price"
                    value="{{ isset($product) ? $product->price : '' }}" id=" exampleFormControlInput1"
                    placeholder="Enter Product Price">
            </div>
            <div class="form-group d-none">
                <label>New Price</label>
                <input type="number" class="form-control" name="new_price"
                    value="{{ isset($product) ? $product->new_price : '' }}" id=" exampleFormControlInput1"
                    placeholder="Enter Product Price">
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
