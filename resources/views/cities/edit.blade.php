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
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul class="alert alert-danger" style="text-align: center">{{ $error }}</ul>
        @endforeach
    @endif
    @section('add_btn')
    <a href="/cities/index"><button class="btn btn-dark btn-sm">Go back</button></a>
    @endsection
    <center>
        <form method="PUT" action="/cities/{{ $city->id }}/update">
            @csrf
            <div class="row">
                <div class="col-12">
                    <label for="exampleInputPassword1" class="form-label">City <b style="color: red">*</b></label>
                    <input type="text" class="form-control" name="name" value="{{ $city->name }}"
                        id="exampleInputPassword1">
                </div>
                <div class="col-12">
                    <label for="exampleInputPassword1" class="form-label">Area Code <b style="color: red">*</b></label>
                    <input type="text" class="form-control" name="area_code" value="{{ $city->area_code }}"
                        id="exampleInputPassword1">
                </div>
            </div>

            <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
    </center>

    </form>
    <script>
        $(function() {
            $('#tbl_types').DataTable();
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
            @if (session('edited'))
                toastr.warning("{{ session('edited') }}");
            @endif
        })
    </script>
@endsection
