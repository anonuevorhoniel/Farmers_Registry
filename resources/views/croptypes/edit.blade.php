@extends('layout')

@section('title')
Type of Crops
@endsection

@section('head_title')
Type of Crops
@endsection

@section('folder')
Type of Crops
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
    <a href="/croptypes/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="PUT" action="/croptypes/{{$type->id}}/update">
        @csrf
        <div class="row">
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Type of Crop <b style="color: red">*</b></label>
          <input type="text" class="form-control" name="name" value="{{$type->name}}" id="exampleInputPassword1">
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
    </center>

      </form>
@endsection
