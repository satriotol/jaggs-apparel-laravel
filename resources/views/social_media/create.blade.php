@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Social Media Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($social_media) {{route('social_media.update', $social_media->id)}} @endisset @empty($social_media) {{route('social_media.store')}}
            @endempty" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($social_media))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                    value="{{isset($social_media) ? $social_media->title : ''}}" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Link</label>
                <input type="text" class="form-control" name="link" id="exampleFormControlInput1"
                    value="{{isset($social_media) ? $social_media->link : ''}}" placeholder="Enter link">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <img src="{{$social_media->image}}" class="img-fluid" alt="" style="height: 100px">
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection