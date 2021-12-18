@extends('layouts.main')
@section('content')
<div class="col-12">
    <!-- Recent Order Table -->
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>Refund Policy</h2>
            <a class="btn btn-primary" href="{{route('refund_policy.create')}}">
                Create
            </a>
        </div>
        @include('partials.success')
        @include('partials.error')
        <div class="card-body pt-0 pb-5">
            <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($refund_policies as $refund_policy)
                    <tr>
                        <td>{{$refund_policy->title}}</td>
                        <td>{!!$refund_policy->content!!}</td>
                        <td>
                            <a href="{{route('refund_policy.edit',$refund_policy->id)}}"
                                class="badge badge-warning">Edit</a>
                            <form action="{{route('refund_policy.destroy',$refund_policy->id)}}" class="d-inline"
                                method="POST">
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