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

    <a href="/croptypes/create"><button class="btn btn-dark">+ Add Crops</button></a>
    <center>
    </center><br><br>
    <table id="tbl_types" style="text-align: center" class="table table-hover">
        <thead class="thead-dark">
            <th>Type of Crops</th>
            <th style="width: 20%">Action</th>
        </thead>
        <tbody>
            @if ($types->count() > 0)
                @foreach ($types as $type)
                    <tr>
                        <td>{{ $type->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/croptypes/{{ $type->id }}/edit">Edit</a></li>
                                    <li><a class="dropdown-item" href="/croptypes/{{ $type->id }}/destroy">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="" style="text-align: center">No Type of Crops Yet</td>
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
