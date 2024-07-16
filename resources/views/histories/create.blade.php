@extends('layout')

@section('title')
    Histories
@endsection

@section('head_title')
    Histories
@endsection

@section('folder')
    Histories
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
    <a href="/histories/index"><button class="btn btn-dark btn-sm">Go back</button></a><br><br>
    <form method="POST" action="/histories/store">
        @csrf
        <div class="row">
            <div class="col-12">
                <center>
                    <label for="exampleInputEmail1" class="form-label">Farmer Name <b style="color: red">*</b></label>
                </center>
                <select name="farmer_id" class="form-control" id="farmer_id">
                    @if (count($farmers) > 0)
                        @foreach ($farmers as $farmer)
                            <option value="{{ $farmer->id }}">{{ $farmer->first_name }} {{ $farmer->middle_name }}
                                {{ $farmer->last_name }}</option>
                        @endforeach
                    @else
                        <option value="" selected disabled>No Farmers Yet</option>
                    @endif
                </select>
            </div>
            <div class="col-12">
                <center>
                    <label for="exampleInputEmail1" class="form-label">Assistance <b style="color: red">*</b></label>
                </center>
                <select name="assistance_id" class="form-control" id="assistance">
                    @if (count($assistances) > 0)
                        @foreach ($assistances as $assistance)
                            <option value="{{ $assistance->id }}">{{ $assistance->name }} </option>
                        @endforeach
                    @else
                        <option value="" selected disabled>No Assistances Yet</option>
                    @endif
                </select>
            </div>
        </div>
        <div class="col-12">
            <center>
                <label for="exampleInputEmail1" class="form-label">Date Given<b style="color: red">*</b></label>
            </center>
            <input type="date" class="form-control" name="given_date" id="">
        </div>
        <center>
            <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Submit</button>
        </center>
    </form>
    <script>
        $(function() {
            $('#farmer_id').selectize();
        $('#assistance').selectize();
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
