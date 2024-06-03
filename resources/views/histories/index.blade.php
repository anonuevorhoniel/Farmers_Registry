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
    <a href="/histories/create"><button class="btn btn-dark">+ Add Histories</button></a>
    <br><br>
    <table id="tbl_histories" class="table table-hover ">
        <thead class="thead-dark">
            <th>Farmer Name</th>
            <th>Assistance</th>
            <th>Given Date</th>
            <th style="width: 20%">Action</th>
        </thead>
    </table><br>
    <script>
        $(document).ready(function() {
            $('#tbl_histories').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ url('/histories/index') }}",
                columns: [
                    {
                        data:"firstname",
                        name:"firstname"
                    },
                    {
                        data:"assistance",
                        name:"assistance"
                    },
                    {
                        data: "given_date",
                        name: "given_date"
                    },
                    {
                        data: "action",
                        name: "action"
                    }
                ]
            });
        });
    </script>
@endsection
