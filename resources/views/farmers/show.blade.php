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
    Show
@endsection

@section('content')
    <a href="/farmers/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="PUT" action="/farmers/{{ $farmer->id }}/update">
        @csrf
        <div class="row">
            <div class="col-6">
                <label for="exampleInputEmail1" class="form-label">First Name <b style="color: red">*</b></label>
                <input type="text" disabled class="form-control" name="first_name" value="{{ $farmer->first_name }}"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Middle Name<b style="color: red">*</b></label>
                <input type="text" disabled class="form-control" name="middle_name" value="{{ $farmer->middle_name }}"
                    id="exampleInputPassword1">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="exampleInputPassword1" class="form-label">Last Name <b style="color: red">*</b></label>
                <input type="text" disabled class="form-control" name="last_name" value="{{ $farmer->last_name }}"
                    id="exampleInputPassword1">
            </div>
            <div class="col-3">
                <label for="exampleInputPassword1" class="form-label">Name Extension</label>
                <input type="text" disabled class="form-control" name="name_extension"
                    value="{{ $farmer->name_extension }}" id="exampleInputPassword1">
            </div>
            <div class="col-3">
                <label for="exampleInputPassword1" class="form-label">Birth Date <b style="color: red">*</b></label>
                <input type="date" disabled class="form-control" name="birth_date" value="{{ $farmer->birth_date }}"
                    id="exampleInputPassword1">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Birth Place <b style="color: red">*</b></label>
                <input type="text" disabled class="form-control" name="birth_place" value="{{ $farmer->birth_place }}"
                    id="exampleInputPassword1">
            </div>
            <div class="col-2">
                <label for="">Sex <b style="color: red">*</b></label>
                <input type="text" disabled class="form-control" name="sex" value="{{ $farmer->sex }}"
                    id="exampleInputPassword1">
            </div>
            <div class="col-4">
                <label for="">Contact Number <b style="color: red">*</b></label>
                <input type="text" disabled class="form-control" name="contact_number"
                    value="{{ $farmer->contact_number }}" id="exampleInputPassword1">
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <label for="">Other Information</label>
                <input type="text" disabled class="form-control" name="other_information"
                    value="{{ $farmer->other_information }}" id="exampleInputPassword1">
            </div>
            <div class="col-6">
                <label for="">Farm Name <b style="color: red">*</b></label>
                <select name="" disabled class="form-control" name="farm_name" value="{{ $farmer->farm_id }}"
                    id="">
                    <option value="" selected>{{ $farmer->farm->name }}</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class='col-12'>
                <label for="">Farm Type <b style="color: red">*</b></label>
                <select name="" disabled class="form-control" name="farm_type" id="">
                    <option value="" selected>{{ $farmer->farmerType->name }}</option>
                </select>
            </div>
            <div class="col-6">

            </div>
        </div>

    </form>
    <br>
    <center>
        <a href="/farmers/{{ $farmer->id }}/edit"><button class="btn btn-dark">Edit</button></a>
    </center>
@endsection
