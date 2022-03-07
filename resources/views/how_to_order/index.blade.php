@extends('layouts.main')
@section('content')
    <div class="col-12">
        <!-- Recent Order Table -->
        <div class="card card-table-border-none" id="recent-orders">
            <div class="card-header justify-content-between">
                <h2>How To Order</h2>
                @if ($how_to_orders->count() < 1)
                    <a class="btn btn-primary" href="{{ route('how_to_order.create') }}">
                        Create
                    </a>
                @endif
            </div>
            @include('partials.success')
            @include('partials.error')
            <div class="card-body pt-0 pb-5">
                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                    <thead>
                        <tr>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($how_to_orders as $how_to_order)
                            <tr>
                                <td>{!! $how_to_order->content !!}</td>
                                <td>
                                    <a href="{{ route('how_to_order.edit', $how_to_order->id) }}"
                                        class="badge badge-warning">Edit</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
