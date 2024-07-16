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
    Create
@endsection

@section('content')

    <div class="row">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="col-3">
                </div>
            @endforeach
        @endif
    </div>
    <a href="/farmertypes/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="POST" action="/farmertypes/store">
        @csrf
        <div class="row">
            <div class="col-12">
                <center>
                    <label for="exampleInputEmail1" class="form-label">Type of Farmers <b style="color: red">*</b></label>
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
