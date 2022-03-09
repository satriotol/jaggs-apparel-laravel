@extends('layouts.main')
@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Account Setting</h2>

        </div>
        @include('partials.success')
        @include('partials.error')
        <div class="card-body">
            <form action="{{ route('setting.update') }} " method="POST">
                @csrf
                <input type="text" class="d-none" value="{{ Auth::user()->id }}" name="user_id" id="">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required class="form-control" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" required class="form-control" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label>Password Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 text-right">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
