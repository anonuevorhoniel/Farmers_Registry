@extends('layout')

@section('title')
    Type of Crops
@endsection

@section('head_title')
    Type of Crops
@endsection

@section('folder')
    Type of Crops
@endsection

@section('file')
    Create
@endsection

@section('content')

    <div class="row">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="col-3">
                    <ul class="alert alert-danger" style="text-align: center; min-height:85px">{{ $error }}</ul>
                </div>
            @endforeach
        @endif
    </div>
    <a href="/croptypes/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="POST" action="/croptypes/store">
        @csrf
        <div class="row">
            <div class="col-12">
                <center>
                    <label for="exampleInputEmail1" class="form-label">Type of Crops<b style="color: red">*</b></label>
                </center>
                <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Submit</button>
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
            @if (session('success'))
                toastr.success("{{ session('success') }}");
            @endif
        })
    </script>
@endsection
