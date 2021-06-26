@extends('layouts.main')
@section('content')
<div class="card card-default">
    <div class="card-header card-header-border-bottom">
        <h2>Basic Form Controls</h2>
    </div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleFormControlInput1">Product Name</label>
                <input type="text" class="form-control" name="name" id="exampleFormControlInput1"
                    placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect12">Category</label>
                <select class="form-control" id="exampleFormControlSelect12" name="category_id">
                    <option>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect12">Category</label>
                <select class="form-control" id="exampleFormControlSelect12" name="age_id">
                    <option>Select Category</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-footer pt-4 pt-5 mt-4 border-top">
                <button type="submit" class="btn btn-primary btn-default">Submit</button>
                <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection