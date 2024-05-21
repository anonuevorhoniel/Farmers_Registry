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
Index
@endsection

@section('content')
<a href="/farmers/create"><button class="btn btn-dark">+ Add Farmers</button></a><br><br>

<table class="table table-hover  table-striped">
    <thead class="thead-dark">
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Farm Name</th>
        <th>Farmer Type</th>
        <th>Action</th>
    </thead>
    <tbody>
    @if ($farmers->count() > 0)
        @foreach($farmers as $farmer)
        <tr>
            <td>{{$farmer->first_name}}</td>
            <td>{{$farmer->middle_name}}</td>
            <td>{{$farmer->last_name}}</td>
            <td>{{$farmer->farm ? $farmer->farm->name : 'Error'}}</td>
            <td>{{$farmer->farmerType ? $farmer->farmerType->name : 'Error' }}</td>
            <td><div class="dropdown">
              <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                Action
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/farmers/{{$farmer->id}}/show">View</a></li>
                  <li><a class="dropdown-item" href="/farmers/{{$farmer->id}}/edit">Edit</a></li>
                  <li><a class="dropdown-item" href="/farmers/{{$farmer->id}}/destroy">Delete</a></li>
                </ul>
              </div></td>


           </tr>
           @endforeach
    @else
    <tr>
      <td colspan="6" style="text-align: center">No Farmers Yet</td>
  </tr>
    @endif
    
    </tbody>
</table>

@endsection
