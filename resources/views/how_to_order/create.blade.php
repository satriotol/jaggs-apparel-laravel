@extends('layouts.main')
@section('content')
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>How To Order Form</h2>

        </div>
        @include('partials.success')
        @include('partials.error')
        <div class="card-body">
            <form
                action="@isset($how_to_order) {{ route('how_to_order.update', $how_to_order->id) }} @endisset @empty($how_to_order) {{ route('how_to_order.store') }} @endempty"
                method="POST">
                @csrf
                @if (isset($how_to_order))
                    @method('PUT')
                @endif
                <div class="form-group">
                    <label>Content</label>
                    <textarea id="summernote"
                        name="content">{{ isset($how_to_order) ? $how_to_order->content : '' }}</textarea>
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 text-right">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-default">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
