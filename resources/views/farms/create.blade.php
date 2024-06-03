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
    <a href="/farms/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="POST" action="/farms/store">
        @csrf
        <div class="row">
        <div class="col-6">
          <label for="exampleInputEmail1" class="form-label">Farm Name <b style="color: red">*</b></label>
          <input type="text" class="form-control" value="{{old('name')}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="col-6">
          <label for="exampleInputPassword1" class="form-label">Location<b style="color: red">*</b></label>
          <select class="form-control" name="city_id" value="{{old('location')}}" id="exampleInputPassword1">
            @if($cities->count() > 0)
            @foreach($cities as $city)
            <option value="{{$city->id}}">{{$city->name}}</option>
            @endforeach
            @else
            <option value="" selected disabled> No Cities Yet</option>
            @endif
          </select> 
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Size <b style="color: red">*</b></label>
          <input type="text" class="form-control" name="size" value="{{old('size')}}"  id="exampleInputPassword1">
        </div>
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Type of Crops <b style="color: red">*</b></label>
          <select class="form-control" name="crop_type" value="{{old('crop_type')}}"  id="exampleInputPassword1">
            @if($crops->count() > 0)
            @foreach ($crops as $crop)
                <option name="" id="{{$crop->name}}">{{$crop->name}}</option>
            @endforeach
            @else
            <option value="" selected disabled>No crops yet</option>
            @endif
          </select>
        </div>
    
    </div>
        <center>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Submit</button>
    </center>
      </form>
@endsection