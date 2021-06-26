@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Product Detail</h2>
            </div>
            @include('partials.success')
            @include('partials.error')
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleFormControlInput1">Product Name</label>
                    <input type="text" disabled class="form-control" name="name"
                        value="{{isset($product) ? $product->name : ''}}" id="exampleFormControlInput1"
                        placeholder="Enter Product Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price</label>
                    <input type="number" disabled class="form-control" name="price"
                        value="{{isset($product) ? $product->price : ''}}" id=" exampleFormControlInput1"
                        placeholder="Enter Product Price">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" disabled name="description" id="exampleFormControlTextarea1"
                        rows="3">{{isset($product) ? $product->description : ''}}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect12">Category</label>
                    <select class="form-control" id="exampleFormControlSelect12" disabled name="category_id">
                        <option>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if (isset($product)) @if ($category->id ===
                            $product->category_id)
                            selected @endif @endif>
                            {{$category->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect12">Age</label>
                    <select class="form-control" id="exampleFormControlSelect12" disabled name="age_id">
                        <option value="">Select Age</option>
                        @foreach ($ages as $age)
                        <option value="{{$age->id}}" @if (isset($product)) @if ($age->id ===
                            $product->age_id)
                            selected @endif @endif>
                            {{$age->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Product Quantity</h2>
            </div>
            @include('partials.success')
            @include('partials.error')
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection