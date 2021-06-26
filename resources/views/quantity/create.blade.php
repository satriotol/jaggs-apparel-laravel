@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Product Form</h2>
    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($quantity) {{route('quantity.update', $quantity->id)}} @endisset @empty($quantity) {{route('quantity.store')}}
            @endempty" method="POST">
            @csrf
            @if (isset($quantity))
            @method('PUT')
            @endif
            <input type="text" name="product_id" value="{{$product->id}}">
            <div class="form-row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Size</label>
                        <input type="text" class="form-control" name="size"
                            value="{{isset($quantity) ? $quantity->size : ''}}" id="exampleFormControlInput1"
                            placeholder="Enter Size">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Unit</label>
                        <input type="number" class="form-control" name="unit"
                            value="{{isset($quantity) ? $quantity->unit : ''}}" id=" exampleFormControlInput1"
                            placeholder="Enter Unit">
                    </div>
                </div>
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection