@extends('layout')

@section('title') Assistances @endsection

@section('head_title') Assistances @endsection

@section('folder') Assistances @endsection

@section('file') Create @endsection

@section('content')

    @if($errors->any())
    @foreach($errors->all() as $error)
    <ul class="alert alert-danger" style="text-align: center">{{$error}}</ul>
    @endforeach
    @endif
    <a href="/assistances/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="PUT" action="/assistances/{{$assistance->id}}/update">
        @csrf
        <div class="row">
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Assistance <b style="color: red">*</b></label>
          <input type="text" class="form-control" name="name" value="{{$assistance->name}}" id="exampleInputPassword1">
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
    </center>

      </form>

@endsection