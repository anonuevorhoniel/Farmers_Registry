@extends('superadmin/layout')

@section('title')
    Audit Trail
@endsection

@section('head_title')
    Audit Trail
@endsection

@section('folder')
    Audit Trail
@endsection

@section('file')
    Index
@endsection

@section('content')
    <table id="aud" class="table table-hover">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Action Used</th>
                <th>Table Modified</th>
                <th>Date</th>
            </tr>
        </thead>

    </table>

    <script>
        $(function() {
            $('#aud').DataTable({
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax: "{{ url('/superadmin/dashboard') }}",
                columns: [{
                        data: 'user_name',
                        name: 'user_name'
                    },
                    {
                        data: "action",
                        name: "action"
                    },
                    {
                        data: "table",
                        name: "table"
                    },
                    {
                        data: "date",
                        name: "date"
                    }

                ]
            });
        })
    </script>
@endsection
