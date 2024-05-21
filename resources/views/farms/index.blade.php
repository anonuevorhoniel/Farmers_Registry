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
    <a href="/farms/create"><button class="btn btn-dark">+ Add Farms</button></a><br><br>
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <th>Farm Name</th>
            <th>Location</th>
            <th>Size</th>
            <th>Type of Crops</th>
            <th>Action</th>
        </thead>
        <tbody>
            @if ($farms->count() > 0)
                @foreach ($farms as $farm)
                    <tr>
                        <td>{{ $farm->name }}</td>
                        <td>{{ $farm->location }}</td>
                        <td>{{ $farm->size }}</td>
                        <td>{{ $farm->crop_type }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/farms/{{ $farm->id }}/edit">Edit</a></li>
                                    <li><a class="dropdown-item" href="/farms/{{ $farm->id }}/destroy">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" style="text-align: center">No Farms Yet</td>
                </tr>
            @endif

        </tbody>
    </table>
@endsection
