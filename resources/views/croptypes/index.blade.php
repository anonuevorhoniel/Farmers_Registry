@extends('layout')

@section('title')
Type of Crops
@endsection

@section('head_title')
Type of Crops
@endsection

@section('folder')
Type of Crops
@endsection

@section('file')
Index
@endsection

@section('content')

<a href="/croptypes/create"><button class="btn btn-dark">+ Add Crops</button></a><br><br>
<table class="table table-hover table-striped" style="text-align: center">
    <thead class="thead-dark">
        <th >Type of Crops</th>
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
                  <li><a class="dropdown-item" href="/croptypes/{{$type->id}}/edit">Edit</a></li>
                  <li><a class="dropdown-item" href="/croptypes/{{$type->id}}/destroy">Delete</a></li>
                </ul>
              </div></td>
           </tr>
           @endforeach
    @else
        <tr>
            <td colspan="5" style="text-align: center">No Type of Crops Yet</td>
        </tr>
    @endif
    
    </tbody>
</table>
@endsection
