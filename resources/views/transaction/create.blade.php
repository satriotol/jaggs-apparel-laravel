@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Transaction Form</h2>
    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="row">
        <div class="card-body">
            <form
                action="@isset($transaction) {{route('transaction.update', $transaction->id)}} @endisset @empty($transaction) {{route('transaction.store')}} @endempty"
                method="POST">
                @csrf
                @if (isset($transaction))
                @method('PUT')
                @endif
                <div class="form-group">
                    <label for="exampleFormControlInput1">Customer Name</label>
                    <input type="text" class="form-control" name="name"
                        value="{{isset($transaction) ? $transaction->name : ''}}" id="exampleFormControlInput1"
                        placeholder="Enter Customer Name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="text" class="form-control" name="email"
                        value="{{isset($transaction) ? $transaction->email : ''}}" id="exampleFormControlInput1"
                        placeholder="Enter Email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Address</label>
                    <input type="text" class="form-control" name="address"
                        value="{{isset($transaction) ? $transaction->address : ''}}" id=" exampleFormControlInput1"
                        placeholder="Enter Address">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Number</label>
                    <input type="number" class="form-control" name="number"
                        value="{{isset($transaction) ? $transaction->number : ''}}" id=" exampleFormControlInput1"
                        placeholder="Enter Phone Number">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection