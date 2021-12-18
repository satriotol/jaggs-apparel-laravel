@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Refund Policy Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($refund_policy) {{route('refund_policy.update', $refund_policy->id)}} @endisset @empty($refund_policy) {{route('refund_policy.store')}}
            @endempty" method="POST">
            @csrf
            @if (isset($refund_policy))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                    value="{{isset($refund_policy) ? $refund_policy->title : ''}}" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Content</label>
                <textarea id="summernote"
                    name="content">{{isset($refund_policy) ? $refund_policy->content : ''}}</textarea>
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection