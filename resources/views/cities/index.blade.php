@extends('layout')

@section('title')
    Cities
@endsection

@section('head_title')
    Cities
@endsection

@section('folder')
    Cities
@endsection

@section('file')
    Index
@endsection

@section('content')
    @include('sweetalert::alert')
    @section('add_btn')
        <a href="/cities/create"><button class="btn btn-dark">+ Add Cities</button></a>
    @endsection

    <table class="table table-hover table-bordered" id="tbl_city" style="text-align: center">
        <thead class="">
            <th>City / Municipality Name</th>
            <th>Area Code</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr class="tr">
                    <td>{{ $city->name }}</td>
                    <td>{{ $city->area_code }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                aria-expanded="false" style=" ">
                                Action
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/cities/{{ $city->id }}/edit">Edit</a></li>
                                <li><a class="dropdown-item delete-btn"
                                        href="/cities/{{ $city->id }}/destroy">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <script>
        $(function() {
            $('#tbl_city').DataTable({
                autoWidth: false,
                order: []
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
