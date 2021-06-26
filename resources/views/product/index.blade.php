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
        <div class="card-body pt-0 pb-5">
            <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th></th>
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
                        <td>Oct 20, 2018</td>
                        <td class="text-right">
                            <div class="dropdown show d-inline-block widget-dropdown">
                                <a class="dropdown-toggle icon-burger-mini" href="" role="button"
                                    id="dropdown-recent-order1" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" data-display="static"></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-recent-order1">
                                    <li class="dropdown-item">
                                        <a href="#">View</a>
                                    </li>
                                    <li class="dropdown-item">
                                        <a href="#">Remove</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection