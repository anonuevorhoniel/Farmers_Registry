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
    Create
@endsection

@section('content')
@include('sweetalert::alert')    
<a href="/cities/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>

<center>
    <form action="/cities/store" method="POST">
        @csrf
    <label for="">City Name <b style="color: red">*</b></label>
    <input type="text" class="form-control" name="name" id="">
    <label for="">Area Code <b style="color: red">*</b></label>
    <input type="number" class="form-control" name="area_code" id=""><br>
    <button class="btn btn-success btn-sm">Add City</button>
</form>
</center>

@endsection