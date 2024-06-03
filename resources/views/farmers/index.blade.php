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

    <table id="tbl_farmers" style="text-align: center" class="table table-hover">
        <thead class="thead-dark">
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Farm Name</th>
            <th>Action</th>
        </thead>
    </table>
    <script>
        $(document).ready(function() {
            var table = $('#tbl_farmers').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ url('/farmers/index') }}",
                columns: [{
                        data: 'first_name',
                        name: 'first_name'
                    },
                    {
                        data: 'middle_name',
                        name: 'middle_name'
                    },
                    {
                        data: 'last_name',
                        name: 'last_name'
                    },
                    {
                        data: "farm.name",
                        name: "farm.name"
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }

                ]
            });
        });
    </script>
@endsection
