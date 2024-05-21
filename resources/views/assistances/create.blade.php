@extends('layout')

@section('title') Assistances @endsection

@section('head_title') Assistances @endsection

@section('folder') Assistances @endsection

@section('file') Create @endsection

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
    <a href="/assistances/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="POST" action="/assistances/store">
        @csrf
        <div class="row">
        <div class="col-12">
            <center>
          <label for="exampleInputEmail1" class="form-label">Assistance Name <b style="color: red">*</b></label>
        </center>
          <input type="text" class="form-control" value="{{old('name')}}" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    </div>
        <center>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Submit</button>
    </center>
      </form>
@endsection
