@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Contact Form</h2>

    </div>
    @include('partials.success')
    @include('partials.error')
    <div class="card-body">
        <form action="@isset($contact) {{route('contact.update', $contact->id)}} @endisset @empty($contact) {{route('contact.store')}}
            @endempty" method="POST">
            @csrf
            @if (isset($contact))
            @method('PUT')
            @endif
            <div class="form-group">
                <label for="exampleFormControlInput1">Title</label>
                <input type="text" class="form-control" name="title" id="exampleFormControlInput1"
                    value="{{isset($contact) ? $contact->title : ''}}" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                    value="{{isset($contact) ? $contact->name : ''}}" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Phone</label>
                <input type="text" class="form-control" name="phone" id="exampleFormControlInput1"
                    value="{{isset($contact) ? $contact->phone : ''}}" placeholder="Enter phone">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Email</label>
                <input type="text" class="form-control" name="email" id="exampleFormControlInput1"
                    value="{{isset($contact) ? $contact->email : ''}}" placeholder="Enter email">
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 text-right">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection