@extends('layouts.main')
@section('content')
<div class="col-12">
    <!-- Recent Order Table -->
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>Transaction</h2>
            {{-- <a class="btn btn-primary" href="{{route("transaction.create")}}">
            Create
            </a> --}}
        </div>
        @include('partials.success')
        @include('partials.error')
        <div class="card-body pt-0 pb-5">
            <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                <thead>
                    <tr>
                        <th>UUID</th>
                        <th>Cust Name</th>
                        <th>Cust Email</th>
                        <th>Cust Number</th>
                        <th>Transaction Total</th>
                        <th>Transaction Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->uuid}}</td>
                        <td>
                            {{$transaction->name}}
                        </td>
                        <td>{{$transaction->email}}</td>
                        <td>{{$transaction->number}}</td>
                        <td>Rp {{number_format($transaction->transaction_total,2)}}</td>
                        <td>{{$transaction->transaction_status}}</td>
                        <td>
                            <a href="{{route('transaction.show',$transaction->id)}}"
                                class="badge badge-primary">Show</a>
                            {{-- <a href="{{route('transaction.edit',$transaction->id)}}"
                            class="badge badge-warning">Edit</a> --}}
                            <form action="{{route('transaction.destroy',$transaction->id)}}" class="d-inline"
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