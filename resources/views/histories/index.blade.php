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
@section('add_btn')
<a href="/histories/create"><button class="btn btn-dark">+ Add Histories</button></a>
@endsection
    <table id="tbl_histories" class="table table-hover table-bordered ">
        <thead class="">
            <th>Farmer Name</th>
            <th>Assistance</th>
            <th>Given Date (YY-mm-dd)</th>
            <th style="width: 20%">Action</th>
        </thead>
    </table><br>
    <script>
        $(document).ready(function() {
            var table = $('#tbl_histories').DataTable({
                order: [],
                processing: true,
                serverSide: true,
                autoWidth: false,
                searching: true,
                ajax: "{{ url('/histories/index') }}",
                columns: [{
                        data: "farmer.first_name",
                        name: "farmer.first_name"
                    },
                    {
                        data: "assistance.name",
                        name: "assistance.name  "
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
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            };

            // Trigger toast if session has success message
            @if (session('success'))
                toastr.error("{{ session('success') }}");
            @endif
        });
    </script>
@endsection
