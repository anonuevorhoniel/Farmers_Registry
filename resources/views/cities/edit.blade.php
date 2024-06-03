@extends('layout')

@section('title')
    Cities
@endsection

@section('head_title')
    Cities
@endsection

@section('folder')
    Cities
@endsection

@section('file')
    Index
@endsection

@section('content')

@if($errors->any())
@foreach($errors->all() as $error)
<ul class="alert alert-danger" style="text-align: center">{{$error}}</ul>
@endforeach
@endif
<a href="/cities/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
<center>
<form method="PUT" action="/cities/{{$city->id}}/update">
    @csrf
    <div class="row">
    <div class="col-12">
        <label for="exampleInputPassword1" class="form-label">City <b style="color: red">*</b></label>
      <input type="text" class="form-control" name="name" value="{{$city->name}}" id="exampleInputPassword1">
    </div>
    <div class="col-12">
        <label for="exampleInputPassword1" class="form-label">Area Code <b style="color: red">*</b></label>
      <input type="text" class="form-control" name="area_code" value="{{$city->area_code}}" id="exampleInputPassword1">
    </div>
</div>

    <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
</center>

  </form>
@endsection
