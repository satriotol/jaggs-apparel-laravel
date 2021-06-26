@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Product Form</h2>
    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($gallery) {{route('gallery.update', $gallery->id)}} @endisset @empty($gallery) {{route('gallery.store')}}
            @endempty" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($gallery))
            @method('PUT')
            @endif
            <div class="form-row">
                <input type="hidden" value="{{$product->id}}" name="product_id">
                <input type="hidden" value="0" name="is_default">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Photo</label>
                        <input type="file" class="form-control" multiple name="photo[]" accept="image/*">
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