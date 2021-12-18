@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Contact Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($faq) {{route('faq.update', $faq->id)}} @endisset @empty($faq) {{route('faq.store')}}
            @endempty" method="POST">
            @csrf
            @if (isset($faq))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Question</label>
                <input type="text" class="form-control" name="question" id="exampleFormControlInput1"
                    value="{{isset($faq) ? $faq->question : ''}}" placeholder="Enter question">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Answer</label>
                <input type="text" class="form-control" name="answer" id="exampleFormControlInput1"
                    value="{{isset($faq) ? $faq->answer : ''}}" placeholder="Enter Answer">
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection