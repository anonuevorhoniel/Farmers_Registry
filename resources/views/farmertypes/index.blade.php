@extends('layout')

@section('title')
Type of Farmers
@endsection

@section('head_title')
Type of Farmers
@endsection

@section('folder')
Type of Farmers
@endsection

@section('file')
Index
@endsection

@section('content')

@section('add_btn')
<a href="/farmertypes/create"><button class="btn btn-dark">+ Add Farmer Types</button></a>
@endsection
<table id="tbl_types" style="text-align: center" class="table table-hover table-bordered">
    <thead class="">
        <th>Type of Farmers</th>
        <th style="width: 20%">Action</th>
    </thead>
    <tbody>
    @if ($types->count() > 0)
        @foreach($types as $type)
        <tr>
            <td>{{$type->name}}</td>
            <td><div class="dropdown">
                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    Action
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/farmertypes/{{$type->id}}/edit">Edit</a></li>
                  <li><a class="dropdown-item" href="/farmertypes/{{$type->id}}/destroy">Delete</a></li>
                </ul>
              </div></td>
           </tr>
           @endforeach
    @else
        <tr>
            <td>No Type of Farmers Yet</td>
            <td></td>
        </tr>
    @endif

    </tbody>
</table><br>
<script>
    $(document).ready(function() {
        $('#tbl_types').DataTable({
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
