@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Sale Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($sale) {{route('sale.update', $sale->id)}} @endisset @empty($sale) {{route('sale.store')}}
            @endempty" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($sale))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" required class="form-control" value="{{isset($sale) ? $sale->title : ''}}"
                    name="title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Banner</label>
                <input type="file" class="form-control" name="banner">
            </div>
            <img src="{{$sale->banner}}" class="img-fluid" alt="">
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection