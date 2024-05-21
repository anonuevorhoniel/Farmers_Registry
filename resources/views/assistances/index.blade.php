@extends('layout')

@section('title')
Assistances
@endsection

@section('head_title')
Assistances
@endsection

@section('folder')
Assistances
@endsection

@section('file')
Index
@endsection

@section('content')

<a href="/assistances/create"><button class="btn btn-dark">+ Add Assistances</button></a><br><br>

<table class="table table-hover table-striped" style="text-align: center">
    <thead class="thead-dark">
        <th>Assitance</th>
        <th style="width: 20%">Action</th>
    </thead>
    <tbody>
    @if ($assistances->count() > 0)
        @foreach($assistances as $assistance)
        <tr>
            <td>{{$assistance->name}}</td>
            <td><div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/assistances/{{$assistance->id}}/edit">Edit</a></li>
                  <li><a class="dropdown-item" href="/assistances/{{$assistance->id}}/destroy">Delete</a></li>
                </ul>
              </div></td>
           </tr>
           @endforeach
    @else
        <tr>
            <td colspan="5" style="text-align: center">No Assistances Yet</td>
        </tr>
    @endif
    
    </tbody>
</table>

@endsection