@extends('layout')

@section('title')
Histories
@endsection

@section('head_title')
Histories
@endsection

@section('folder')
Histories
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
    <a href="/histories/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="PUT" action="/histories/{{$histories->id}}/update">
        @csrf
        <div class="row">
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Assistance <b style="color: red">*</b></label>
            <select name="farmer_id" id="" class="form-control" >
            <option selected  value="{{$histories->farmer->id}}">{{$histories->farmer->first_name}}</option>
            @if($farmers->count() > 0)
            @foreach($farmers as $farmer)
            @if($histories->farmer->id !== $farmer->id)
            <option value="{{$farmer->id}}">{{$farmer->first_name}}</option>
            @endif
            @endforeach
            @else
            @endif
        </select>
        </div>
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Assistance <b style="color: red">*</b></label>
            <select name="assistance_id" id="" class="form-control" >
                <option selected  value="{{$histories->assistance->id}}">{{$histories->assistance->name}}</option>
                @if($assistances->count() > 0)
                @foreach($assistances as $assistance)
                @if($histories->assistance->id !== $assistance->id)
                <option value="{{$assistance->id}}">{{$assistance->name}}</option>
                @endif
                @endforeach
                @else
                @endif
            </select>
        </div>
        <div class="col-12">
            <label for="exampleInputPassword1" class="form-label">Assistance <b style="color: red">*</b></label>
          <input type="date" class="form-control" name="given_date" value="{{$histories->given_date}}" id="exampleInputPassword1">
        </div>
    </div>
    <center>
        <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
    </center>
      </form>
@endsection