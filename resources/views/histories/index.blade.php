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
Index
@endsection

@section('content')
<a href="/histories/create"><button class="btn btn-dark">+ Add Histories</button></a><br><br>
<table class="table table-hover table-striped">
    <thead class="thead-dark">
        <th>Farmer Name</th>
        <th>Assistance</th>
        <th>Given Date</th>
        <th style="width: 20%">Action</th>
    </thead>
    <tbody>
    @if ($histories->count() > 0)
        @foreach($histories as $history)
        <tr>
            <td>{{$history->farmer->first_name}}</td>
            <td>{{$history->assistance->name}}</td>
            <td>{{$history->given_date}}</td>
        
            <td><div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/histories/{{$history->id}}/edit">Edit</a></li>
                  <li><a class="dropdown-item" href="/histories/{{$history->id}}/destroy">Delete</a></li>
                </ul>
              </div></td>
           </tr>
           @endforeach
    @else
        <tr>
            <td colspan="5" style="text-align: center">No histories Yet</td>
        </tr>
    @endif
    
    </tbody>
</table>
@endsection