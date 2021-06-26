@extends('layouts.main')
@section('content')
<div class="col-12">
    <!-- Recent Order Table -->
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>Recent Orders</h2>
            <div class="date-range-report ">
                <span>May 28, 2021 - Jun 26, 2021</span>
            </div>
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
                            <div class="badge badge-warning">Edit</div>
                            <div class="badge badge-danger">Delete</div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection