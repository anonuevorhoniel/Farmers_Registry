@extends('layout')

@section('title')
    Farmer's Assistance History
@endsection

@section('head_title')
    {{$name}}'s Assistance History
@endsection

@section('folder')
    Farmer's Assistance History
@endsection

@section('file')
    Report
@endsection

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul class="alert alert-danger" style="text-align: center">{{ $error }}</ul>
        @endforeach
    @endif
    @section('add_btn')
    <a href="/farmers/index"><button class="btn btn-dark btn-sm">Go back</button></a>
    @endsection
    <button class="btn btn-success" onclick="window.location.href='/farmers/{{$id}}/pdf'" style="float:right"><i class="fa-solid fa-print"></i></button>
    <h4>Farmer Information</h4>
    <br>
<form method="PUT" action="/farmers/{{ $farmer_info->id }}/update">
    @csrf
    <div class="row">
        <div class="col-6">
            <label for="exampleInputEmail1" class="form-label">First Name <b style="color: red">*</b></label>
            <input type="text" disabled class="form-control" name="first_name" value="{{ $farmer_info->first_name }}"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Middle Name<b style="color: red">*</b></label>
            <input type="text" disabled class="form-control" name="middle_name" value="{{ $farmer_info->middle_name }}"
                id="exampleInputPassword1">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="exampleInputPassword1" class="form-label">Last Name <b style="color: red">*</b></label>
            <input type="text" disabled class="form-control" name="last_name" value="{{ $farmer_info->last_name }}"
                id="exampleInputPassword1">
        </div>
        <div class="col-3">
            <label for="exampleInputPassword1" class="form-label">Name Extension</label>
            <input type="text" disabled class="form-control" name="name_extension"
                value="{{ $farmer_info->name_extension }}" id="exampleInputPassword1">
        </div>
        <div class="col-3">
            <label for="exampleInputPassword1" class="form-label">Birth Date <b style="color: red">*</b></label>
            <input type="date" disabled class="form-control" name="birth_date" value="{{ $farmer_info->birth_date }}"
                id="exampleInputPassword1">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="">Birth Place <b style="color: red">*</b></label>
            <input type="text" disabled class="form-control" name="birth_place" value="{{ $farmer_info->birth_place }}"
                id="exampleInputPassword1">
        </div>
        <div class="col-2">
            <label for="">Sex <b style="color: red">*</b></label>
            <input type="text" disabled class="form-control" name="sex" value="{{ $farmer_info->sex }}"
                id="exampleInputPassword1">
        </div>
        <div class="col-4">
            <label for="">Contact Number <b style="color: red">*</b></label>
            <input type="text" disabled class="form-control" name="contact_number"
                value="{{ $farmer_info->contact_number }}" id="exampleInputPassword1">
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <label for="">Other Information</label>
            <input type="text" disabled class="form-control" name="other_information"
                value="{{ $farmer_info->other_information }}" id="exampleInputPassword1">
        </div>
        <div class="col-6">
            <label for="">Farm Name <b style="color: red">*</b></label>
            <select name="" disabled class="form-control" name="farm_name" value="{{ $farmer_info->farm_id }}"
                id="">
                <option value="" selected>{{ $farmer_info->farm->name }}</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class='col-12'>
            <label for="">Farm Type <b style="color: red">*</b></label>
            <select name="" disabled class="form-control" name="farm_type" id="">
                <option value="" selected>{{ $farmer_info->farmerType->name }}</option>
            </select>
        </div>
        <div class="col-6">

        </div>
    </div>

</form>
<br><br>
<hr>

<h4>Assistance History</h4><br>
<table class="table hover table-bordered" id="tbl_histories">
    <thead>
        <th>Assistance</th>
        <th>Given Date</th>
    </thead>
    <tbody>
        @foreach ($farmers as $farmer)
        <tr>
        <td>{{$farmer->assistance->name}}</td>
        <td>{{$farmer->given_date}}</td>
        @endforeach
     </tr>
    </tbody>
</table>
    <script>
        $(function() {
            $('#tbl_histories').DataTable({
                aaSorting: []
            });
        });
    </script>
@endsection
