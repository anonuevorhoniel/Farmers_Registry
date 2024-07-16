@extends('layout')

@section('title')
    Cities
@endsection

@section('head_title')
@endsection

@section('folder')
Total Assistance Histories
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
            <th>Farm Name</th>
            <th>Assistance</th>
            <th>Given Date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($cities->farms as $farms)
                @foreach ($farms->farmers as $farmer)
                @foreach($farmer->assistanceHistory as $histories)
                    <tr class="tr">
                        <td>{{ $farmer->first_name }} {{$farmer->last_name}}</td>
                        <td>{{ $histories->assistance->name}}</td>
                        <td>{{ $histories->given_date}}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/histories/{{ $histories->id }}/edit">Edit</a></li>
                                    <li><a class="dropdown-item delete-btn"
                                            href="/histories/{{ $histories->id }}/destroy">Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
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
