@extends('layout')

@section('title')
Total Farmers
@endsection

@section('head_title')

@endsection

@section('folder')
    Total Farmers
@endsection

@section('file')
{{ $cities->name }} / Index
@endsection

@section('content')
    @include('sweetalert::alert')
        @section('add_btn')
            <a href="/dashboard"><button class="btn btn-dark">Back to Dashboard</button></a>
        @endsection
    <table class="table table-hover table-bordered" id="tbl_city" style="text-align: center">
        <thead class="">
            <th>First Name</th>
            <th>Middle name</th>
            <th>Last Name</th>
            <th>Farm Name</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($cities->farms as $farms)
                @foreach ($farms->farmers as $farmer)
                    <tr class="tr">
                        <td>{{ $farmer->first_name }}</td>
                        <td>{{ $farmer->middle_name }}</td>
                        <td>{{ $farmer->last_name }}</td>
                        <td>{{ $farmer->farm->name }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/farmers/{{ $farmer->id }}/edit">Edit</a></li>
                                    <li><a class="dropdown-item delete-btn"
                                            href="/farmers/{{ $farmer->id }}/destroy">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
    <br>
    <script>
        $(function() {
            $('#tbl_city').DataTable({
                // Add Bootstrap 5 classes to DataTable

            });
        });
    </script>
@endsection
