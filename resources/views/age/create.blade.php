@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Age Product Form</h2>
    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($age) {{route('age.update', $age->id)}} @endisset @empty($age) {{route('age.store')}}
            @endempty" method="POST">
            @csrf
            @if (isset($age))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                    value="{{isset($age) ? $age->name : ''}}" placeholder="Enter Name">
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection