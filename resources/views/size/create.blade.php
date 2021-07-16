@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Product Size Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($size) {{route('size.update', $size->id)}} @endisset @empty($size) {{route('size.store')}}
            @endempty" method="POST">
            @csrf
            @if (isset($size))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                    value="{{isset($size) ? $size->name : ''}}" placeholder="Enter Name">
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection