@extends('layout')

@section('title')
Farmers
@endsection

@section('head_title')
Farmers
@endsection

@section('folder')
Farmers
@endsection

@section('file')
Create
@endsection

@section('content')

    <div class="row">
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="col-3">
    <ul class="alert alert-danger" style="text-align: center; min-height:85px">{{$error}}</ul>
    </div>
    @endforeach
    @endif
</div>
    <a href="/farmers/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="POST" action="/farmers/store">
        @csrf
        <div class="row">
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">First Name <b style="color: red">*</b></label>
          <input type="text" class="form-control" value="{{old('first_name')}}" name="first_name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="col-6">
          <label for="exampleInputPassword1" class="form-label">Middle Name<b style="color: red">*</b></label>
          <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}" id="exampleInputPassword1">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Last Name <b style="color: red">*</b></label>
          <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}"  id="exampleInputPassword1">
        </div>
        <div class="col-3">
            <label for="exampleInputPassword1" class="form-label">Name Extension</label>
          <input type="text" class="form-control" name="name_extension" value="{{old('name_extension')}}"  id="exampleInputPassword1">
        </div>
        <div class="col-3">
            <label for="exampleInputPassword1" class="form-label">Birth Date <b style="color: red">*</b></label>
          <input type="date" class="form-control" name="birth_date" value="{{old('birth_date')}}"  id="exampleInputPassword1">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="">Birth Place <b style="color: red">*</b></label>
            <input type="text" class="form-control" name="birth_place" value="{{old('birth_place')}}"  id="exampleInputPassword1">
        </div>
        <div class="col-2">
            <label for="">Sex <b style="color: red">*</b></label>
            <select class="form-control" name="sex" value="{{old('sex')}}"  id="exampleInputPassword1">
                <option value="" selected disabled>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        <div class="col-4">
            <label for="">Contact Number <b style="color: red">*</b></label>
            <input type="text" class="form-control" name="contact_number" value="{{old('contact_number')}}"  id="exampleInputPassword1">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="">Other Information</label>
            <input type="text" class="form-control" name="other_information" value="{{old('other_information')}}"  id="exampleInputPassword1">
        </div>
        <div class="col-6">
            <label for="">Farm Name <b style="color: red">*</b></label>
            <select name="farm_id"class="form-control"  value="{{old('farm_name')}}"  id="">
                @if($farms->count() > 0)
                @foreach($farms as $farm)
                    <option value="{{$farm->id}}">{{$farm->name}}</option>
                @endforeach
                @else
                <option value="" selected disabled>No Farms</option>
                @endif
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
            <label for="">Farmer Type <b style="color: red">*</b></label>
            <select name="farmer_type_id" class="form-control" value="{{old('farm_type')}}"  id="">
            @if($types->count() > 0)
            @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
            @else
            <option value="" selected disabled>No Farmer Types</option>
            @endif
            </select>
        </div>
        <div class="col-6">

        </div>
    </div>
        <center>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Submit</button>
    </center>
      </form>
@endsection 

