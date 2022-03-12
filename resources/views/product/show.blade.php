@extends('layouts.main')
@section('content')
    @include('partials.success')
    @include('partials.error')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Product Detail</h2>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Product Name</label>
                        <input type="text" disabled class="form-control" name="name"
                            value="{{ isset($product) ? $product->name : '' }}" id="exampleFormControlInput1"
                            placeholder="Enter Product Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Price</label>
                        <input type="number" disabled class="form-control" name="price"
                            value="{{ isset($product) ? $product->price : '' }}" id=" exampleFormControlInput1"
                            placeholder="Enter Product Price">
                    </div>
                    <div class="form-group d-none">
                        <label for="exampleFormControlInput1">New Price</label>
                        <input type="number" disabled class="form-control" name="new_price"
                            value="{{ isset($product) ? $product->new_price : '' }}" id=" exampleFormControlInput1"
                            placeholder="Enter Product Price">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" disabled name="description" id="exampleFormControlTextarea1"
                            rows="3">{{ isset($product) ? $product->description : '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Weight</label>
                        <input type="number" class="form-control" name="weight" disabled
                            value="{{ isset($product) ? $product->weight : '' }}">
                    </div>
                    <div class="form-group d-none">
                        <label>Is Sale ?</label>
                        <select name="is_sale" class="form-control" required disabled>
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
                        <label for="exampleFormControlSelect12">Category</label>
                        <input type="text" class="form-control" disabled value="{{ $product->category_name }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Product Quantity</h2>
                    <a class="btn btn-primary" href="{{ route('quantity.create', $product->id) }}">
                        Create
                    </a>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>Size</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                                <tr>
                                    <td>{{ $size->name }}</td>
                                    <td>
                                        @foreach ($size->product_size as $ps)
                                            @if ($ps->product_id == $product->id)
                                                {{ $ps->qty }}
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card card-table-border-none" id="recent-orders">
                <div class="card-header justify-content-between">
                    <h2>Product Gallery</h2>
                    <a class="btn btn-primary" href="{{ route('gallery.create', $product->id) }}">
                        Create
                    </a>
                </div>
                <div class="card-body pt-0 pb-5">
                    <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($galleries as $gallery)
                                <tr>
                                    <td><img src="{{ $gallery->photo }}" height="100px" alt=""></td>
                                    <td>
                                        <form action="{{ route('gallery.destroy', $gallery->id) }}"
                                            class="d-inline" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="badge badge-danger" onclick="return confirm('Are you sure?')"
                                                type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
