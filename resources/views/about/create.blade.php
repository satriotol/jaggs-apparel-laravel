@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>About Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($about) {{route('about.update', $about->id)}} @endisset @empty($about) {{route('about.store')}}
            @endempty" method="POST">
            @csrf
            @if (isset($about))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <textarea name="description"
                    class="form-control">{{isset($about) ? $about->description : ''}}</textarea>
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection