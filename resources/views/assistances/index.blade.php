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
        @section('add_btn')
        <a href="/assistances/create"><button class="btn btn-dark">+ Add Assistances</button></a>
        @endsection
    </div>
    <table id="tbl_assistances" style="text-align: center" class="table table-hover table-bordered">
        <thead class="">
            <th>Assistance</th>
            <th>Value</th>
            <th>Action</th>
        </thead>
    </table>
    <br>
    <script>
        $(document).ready(function() {
            $('#tbl_assistances').DataTable({
                order: [],
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ url('/assistances/index') }}",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'value',
                        name: 'value'
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
                "progressBar": true,
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
