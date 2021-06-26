@extends('layouts.main')
@section('content')
<div class="col-12">
    <!-- Recent Order Table -->
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>Product Category</h2>
            <a class="btn btn-primary" href="{{route("productcategory.create")}}">
                Create
            </a>
        </div>
        <div class="card-body pt-0 pb-5">
            <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            <a href="{{route('productcategory.edit',$category->id)}}"
                                class="badge badge-warning">Edit</a>
                            <button class="badge badge-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection