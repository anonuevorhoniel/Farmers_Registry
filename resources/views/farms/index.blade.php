@extends('layout')

@section('title')
    Farms
@endsection

@section('head_title')
    Farms
@endsection

@section('folder')
    Farms
@endsection

@section('file')
    Index
@endsection

@section('content')
@section('add_btn')
    <a href="/farms/create"><button class="btn btn-dark">+ Add Farms</button></a>
@endsection
    <table id="tbl_farms" class="table table-hover table-bordered">
        <thead class="">
            <th>Farm Name</th>
            <th>Location</th>
            <th>Size</th>
            <th>Type of Crop</th>
            <th>Action</th>
        </thead>
    </table><br>
    <script>
        $(document).ready(function() {
            var table = $('#tbl_farms').DataTable({
                order: [],
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: "{{ url('/farms/index') }}",
                columns: [{
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "city.name",
                        name: "city.name"
                    },
                    {
                        data: "size",
                        name: "size"
                    },
                    {
                        data: 'crop_type',
                        name: 'crop_type'
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
