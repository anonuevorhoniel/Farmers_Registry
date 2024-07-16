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
@section('add_btn')
<a href="/farmers/create"><button class="btn btn-dark">+ Add Farmers</button></a>
@endsection

    <table id="tbl_farmers" style="text-align: center" class="table table-hover table-bordered">
        <thead class="">
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
                order: [],
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
            $('#tbl_types').DataTable({
                "order": []
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
