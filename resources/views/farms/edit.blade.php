@extends('layout')

@section('title')
Farms
@endsection

@section('head_title')
Farms
@endsection

@section('folder')
Farms
@endsection

@section('file')
Edit
@endsection

@section('content')

    @if($errors->any())
    @foreach($errors->all() as $error)
    <ul class="alert alert-danger" style="text-align: center">{{$error}}</ul>
    @endforeach
    @endif
    <a href="/farms/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="PUT" action="/farms/{{$farm->id}}/update">
        @csrf
        <div class="row">
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Name<b style="color: red">*</b></label>
          <input type="text" class="form-control" name="name" value="{{$farm->name}}" id="exampleInputPassword1">
        </div>
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Location<b style="color: red">*</b></label>
          <input type="text" class="form-control" name="location" value="{{$farm->location}}" id="exampleInputPassword1">
        </div>
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Size<b style="color: red">*</b></label>
          <input type="text" class="form-control" name="size" value="{{$farm->size}}" id="exampleInputPassword1">
        </div>
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Crop type<b style="color: red">*</b></label>
          <input type="text" class="form-control" name="crop_type" value="{{$farm->crop_type}}" id="exampleInputPassword1">
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
    </center>

      </form>
@endsection
