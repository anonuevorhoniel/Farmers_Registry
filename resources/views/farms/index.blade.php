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
    Index
@endsection

@section('content')
    <div class="row">
        <a href="/farms/create"><button class="btn btn-dark">+ Add Farms</button></a>
        
    </div>
    <br>
    <table id="tbl_farms" class="table table-hover">
        <thead class="thead-dark">
            <th>Farm Name</th>
           <th>Location</th>
          <th>Size</th>
          <th>Type of Crop</th> 
            <th>Action</th>
        </thead>
    </table><br>
    <script>
   $(document).ready(function() {
    var table = $('#tbl_farms').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax : "{{url('/farms/index')}}",
        columns:[{
                data: "name",
                name: "name"
                },
                {
                data: "city.name",
                name: "city.name"
                },
                {
                data: "size",
                name: "size"
                },
                {
                data: "crop_type",
                name: "crop_type"
                },
                {
                data: "action",
                name: "action"
                }
            ]
        
        }
    );

  
});



        
    </script>

@endsection
