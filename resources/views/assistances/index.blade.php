@extends('layout')

@section('title')
    Assistances
@endsection

@section('head_title')
    Assistances
@endsection

@section('folder')
    Assistances
@endsection

@section('file')
    Index
@endsection

@section('content')
    <div class="row">
        <a href="/assistances/create"><button class="btn btn-dark">+ Add Assistances</button></a>
    </div>
    <br><br>

    <table id="tbl_assistances" style="text-align: center" class="table table-hover">
        <thead class="thead-dark">
            <th>Assistance</th>
            <th>Action</th>
        </thead>
    </table>
    <br>
    <script>
        $(document).ready(function() {
            $('#tbl_assistances').DataTable({
                processing: true,
                serverSide: true,
            autoWidth: false,
                ajax: "{{ url('/assistances/index') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data:"action",
                        name:"action"
                    }
                  
                ]
            });
        });
    </script>
@endsection
