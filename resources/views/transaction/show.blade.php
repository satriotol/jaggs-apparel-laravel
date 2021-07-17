@extends('layouts.main')
@section('content')
@include('partials.success')
@include('partials.error')
<div class="row">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>Transaction Detail {{$transaction->uuid}}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <p>Name</p>
                    </div>
                    <div class="col">
                        {{$transaction->name}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Number</p>
                    </div>
                    <div class="col">
                        {{$transaction->number}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Email</p>
                    </div>
                    <div class="col">
                        {{$transaction->email}}
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <p>Address</p>
                    </div>
                    <div class="col">
                        {{$transaction->address}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-table-border-none">
            <div class="card-header card-header-border-bottom">
                <h2>Product Quantity</h2>
                <a class="ml-auto badge badge-primary" href="{{route('transactiondetail.create',$transaction->id)}}">
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
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection