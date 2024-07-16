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
    Edit
@endsection

@section('content')

    @php
        $cropluck = $crop_select->pluck('crop_id');
    @endphp
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul class="alert alert-danger" style="text-align: center">{{ $error }}</ul>
        @endforeach
    @endif
    @section('add_btn')
    <a href="/farms/index"><button class="btn btn-dark btn-sm">Go back</button></a>
    @endsection
    <form method="PUT" action="/farms/{{ $farm->id }}/update">
        @csrf
        <div class="row">
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Name<b style="color: red">*</b></label>
                <input type="text" class="form-control" name="name" value="{{ $farm->name }}"
                    id="exampleInputPassword1">
            </div>
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Location<b style="color: red">*</b></label>
                <select type="text" class="form-control" name="location" id="location">
                    <option value="{{ $farm->city->id }}" selected>{{ $farm->city->name }}</option>
                    @if ($cities->count() > 0)
                        @foreach ($cities as $city)
                            @if ($city->id !== $farm->city->id)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endif
                        @endforeach
                    @else
                        <option value="" selected disabled>No Cities</option>
                    @endif
                </select>
            </div>
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Size<b style="color: red">*</b></label>
                <input type="text" class="form-control" name="size" value="{{ $farm->size }}"
                    id="exampleInputPassword1">
            </div>
            <div class="col-12">
                <label for="exampleInputPassword1" class="form-label">Crop type<b style="color: red">*</b></label>
                <select class="form-control" style="width: 100% !important" name="crop_type[]" id="crop_select" multiple>
                    @foreach ($crop_select as $selected)
                        <option selected value="{{ $selected->crop->id }}">{{ $selected->crop->name }}</option>
                    @endforeach
                    @foreach ($crops as $crop)
                        @if (!$cropluck->contains($crop->id))
                            <option value="{{ $crop->id }}">{{ $crop->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <center>
            <button type="submit" class="btn btn-outline-dark" style="margin-top: 2%">Update</button>
        </center>

    </form>
    <script>
        $(function() {
            $('#crop_select').select2({
                theme: 'classic'
            });
            $('#location').selectize();
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
