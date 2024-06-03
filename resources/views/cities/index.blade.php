@extends('layout')

@section('title')
    Cities
@endsection

@section('head_title')
    Cities
@endsection

@section('folder')
    Cities
@endsection

@section('file')
    Index
@endsection

@section('content')
    @include('sweetalert::alert')
    <div class="row">
        <a href="/cities/create"><button class="btn btn-dark">+ Add Cities</button></a>
    </div>
    <br>
    <center>
        <br>
        <table class="table table-hover" id="tbl_city" style="text-align: center">
            <thead class="thead-dark">
                <th>City Name</th>
                <th>Area Code</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($cities as $city)
                    <tr class="tr">
                        <td>{{ $city->name }}</td>
                        <td>{{ $city->area_code }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false" style=" ">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/cities/{{ $city->id }}/edit">Edit</a></li>
                                    <li><a class="dropdown-item delete-btn"
                                            href="/cities/{{ $city->id }}/destroy">Delete</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <script>
            $(function() {
                $('#tbl_city').DataTable();
            });
        </script>

    </center>
@endsection
