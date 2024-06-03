@extends('layout')

@section('title')
Type of Farmers
@endsection

@section('head_title')
Type of Farmers
@endsection

@section('folder')
Type of Farmers
@endsection

@section('file')
Index
@endsection

@section('content')

<a href="/farmertypes/create"><button class="btn btn-dark">+ Add Crops</button></a><br><br>
<table id="tbl_types" style="text-align: center" class="table table-hover">
    <thead class="thead-dark">
        <th>Type of Farmers</th>
        <th style="width: 20%">Action</th>
    </thead>
    <tbody>
    @if ($types->count() > 0)
        @foreach($types as $type)
        <tr>
            <td>{{$type->name}}</td>
            <td><div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/farmertypes/{{$type->id}}/edit">Edit</a></li>
                  <li><a class="dropdown-item" href="/farmertypes/{{$type->id}}/destroy">Delete</a></li>
                </ul>
              </div></td>
           </tr>
           @endforeach
    @else
        <tr>
            <td>No Type of Farmers Yet</td>
            <td></td>
        </tr>
    @endif
    
    </tbody>
</table><br>
<script>
    $(document).ready(function() {
        $('#tbl_types').DataTable();
    });
</script>
@endsection