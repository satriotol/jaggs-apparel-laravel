@extends('layouts.main')
@section('content')
<div class="col-12">
    <!-- Recent Order Table -->
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>Products</h2>
            <a class="btn btn-primary" href="{{route("product.create")}}">
                Create
            </a>
        </div>
        @include('partials.success')
        @include('partials.error')
        <div class="card-body pt-0 pb-5">
            <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Age</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <a class="text-dark" href=""> {{$product->name}}</a>
                        </td>
                        <td>Rp {{number_format($product->price,2)}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->age->name}}</td>
                        <td>
                            <a href="{{route('product.edit',$product->id)}}" class="badge badge-warning">Edit</a>
                            <form action="{{route('product.destroy',$product->id)}}" class="d-inline" method="POST">
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
@endsection