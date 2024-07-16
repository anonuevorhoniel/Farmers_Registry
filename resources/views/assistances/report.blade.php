@extends('layout')

@section('title')
    Assistances
@endsection

@section('head_title')
    Assistances
@endsection

@section('folder')
    Assistances
@endsection

@section('file')
    Report
@endsection

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <ul class="alert alert-danger" style="text-align: center">{{ $error }}</ul>
        @endforeach
    @endif
    @section('add_btn')
    <a href="/assistances/index"><button class="btn btn-dark btn-sm">Go back</button></a>
    @endsection
    <button class="btn btn-success" style="float:right"><i class="fa-solid fa-print"></i></button>
<table class="table hover table-bordered" id="tbl_farmers">
    <thead>
        <th>Farm Name</th>
        <th>Location</th>
        <th>Total</th>
        
    </thead>
    <tbody>
        @foreach ($reports as $report)
        <tr>
        <td>{{$report->farmer->farm->count()}}</td>
        <td></td>
        <td></td>
        @endforeach
     </tr>
    </tbody>
</table>

    <script>
        $(function() {
            $('#tbl_farmers').DataTable({
                aaSorting: [],
            });
        });
    </script>
@endsection
