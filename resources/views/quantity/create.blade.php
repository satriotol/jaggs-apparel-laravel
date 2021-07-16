@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>{{$product->name}} Quantity Form</h2>
    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="{{route('quantity.store')}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product->id}}" id="">
            <div class="form-group">
                <label for="exampleFormControlInput1">Size</label>
                <select name="size_id" id="" class="form-control">
                    <option value="">Select Size</option>
                    @foreach ($sizes as $size)
                    <option value="{{$size->id}}">{{$size->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" class="form-control" name="qty">
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="">Select Status</option>
                    @foreach ($statuses as $status)
                    <option value="{{$status}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection