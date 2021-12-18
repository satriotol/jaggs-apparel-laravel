@extends('layouts.main')
@section('content')
<div class="col-12">
    <!-- Recent Order Table -->
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>FAQ</h2>
            <a class="btn btn-primary" href="{{route('faq.create')}}">
                Create
            </a>
        </div>
        @include('partials.success')
        @include('partials.error')
        <div class="card-body pt-0 pb-5">
            <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($faqs as $faq)
                    <tr>
                        <td>{{$faq->question}}</td>
                        <td>{{$faq->answer}}</td>
                        <td>
                            <a href="{{route('faq.edit',$faq->id)}}" class="badge badge-warning">Edit</a>
                            <form action="{{route('faq.destroy',$faq->id)}}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="badge badge-danger" onclick="return confirm('Are you sure?')"
                                    type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection