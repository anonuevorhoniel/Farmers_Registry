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
    Create
@endsection

@section('content')
    <a href="/cities/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>

    <center>
        <form action="/cities/store" method="POST">
            @csrf
            <label for="">City Name <b style="color: red">*</b></label>
            <input type="text" class="form-control" name="name" id="">
            <label for="">Area Code <b style="color: red">*</b></label>
            <input type="number" class="form-control" name="area_code" id=""><br>
            <button class="btn btn-success btn-sm">Add City</button>
        </form>
    </center>
    <script>
        $(function() {
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
                toastr.success("{{ session('success') }}");
            @endif
        })
    </script>
@endsection
