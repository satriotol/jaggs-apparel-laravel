@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Home Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($home) {{route('home.update', $home->id)}} @endisset @empty($home) {{route('home.store')}}
            @endempty" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($home))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" name="title" value="{{$home->title}}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Background</label>
                <input type="file" class="form-control" name="background">
                <img src="{{$home->background}}" class="img-fluid" alt="">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Logo</label>
                <input type="file" class="form-control" name="logo">
                <img src="{{$home->logo}}" class="img-fluid" alt="">
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection