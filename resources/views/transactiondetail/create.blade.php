@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Transaction Detail Form</h2>
    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="row">
        <div class="card-body">
            <form
                action="@isset($transactiondetail) {{route('transactiondetail.update', $transactiondetail->id)}} @endisset @empty($transactiondetail) {{route('transactiondetail.store', $transaction->id)}} @endempty"
                method="POST">
                @csrf
                @if (isset($transactiondetail))
                @method('PUT')
                @endif
                <div class="form-group">
                    <label for="">Product</label>
                    <select name="product_size_id" id="" class="form-control">
                        <option value="">Choose Product</option>
                        @foreach ($product_sizes as $product_size)
                        <option value="{{$product_size->id}}">
                            {{$product_size->product->name}}/{{$product_size->size->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Qty</label>
                    <input type="number" class="form-control" name="qty">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 text-right">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection