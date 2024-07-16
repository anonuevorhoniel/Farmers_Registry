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
    Edit
@endsection

@section('content')


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul class="alert alert-danger" style="text-align: center">{{ $error }}</ul>
        @endforeach
    @endif
    @section('add_btn')
    <a href="/farmertypes/index"><button class="btn btn-dark btn-sm">Go back</button></a>
    @endsection
    <form method="PUT" action="/farmertypes/{{ $type->id }}/update">
        @csrf
        <div class="row">
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Farmer Type <b style="color: red">*</b></label>
                <input type="text" class="form-control" name="name" value="{{ $type->name }}"
                    id="exampleInputPassword1">

            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
        </center>

    </form>
    <script>
        $(function() {
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
