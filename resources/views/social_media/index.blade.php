@extends('layouts.main')
@section('content')
<div class="col-12">
    <!-- Recent Order Table -->
    <div class="card card-table-border-none" id="recent-orders">
        <div class="card-header justify-content-between">
            <h2>Social Media</h2>
            <a class="btn btn-primary" href="{{route('social_media.create')}}">
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
                        <th>Link</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($social_medias as $social_media)
                    <tr>
                        <td>{{$social_media->title}}</td>
                        <td>{{$social_media->link}}</td>
                        <td><img src="{{$social_media->image}}" class="img-fluid" style="height:100px" alt=""></td>
                        <td>
                            <a href="{{route('social_media.edit',$social_media->id)}}"
                                class="badge badge-warning">Edit</a>
                            <form action="{{route('social_media.destroy',$social_media->id)}}" class="d-inline"
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