@extends('layout')

@section('title')
Total Farms
@endsection

@section('head_title')
@endsection

@section('folder')
    Total Farms
@endsection

@section('file')
{{$cities->name}} / Index
@endsection

@section('content')
    @include('sweetalert::alert')
        @section('add_btn')
        <a href="/dashboard"><button class="btn btn-dark">Back to Dashboard</button></a>
    @endsection
        <table class="table table-hover table-bordered" id="tbl_city" style="text-align: center">
            <thead class="">
                <th>Farm Name</th>
                <th>Size</th>
                <th>Crop type</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach ($cities->farms as $farm )
                    <tr class="tr">
                        <td>{{ $farm->name }}</td>
                        <td>{{$farm->size}}</td>
                        <td>@php
                            $all = [];
                        foreach($farm->farm_crops as $crops){
                            $all[] = $crops->crop->name;
                        }
                        echo implode(', ', $all);
                        @endphp</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-warning dropdown-toggle" type="button" data-toggle="dropdown"
                                    aria-expanded="false" style=" ">
                                    Action
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/farms/{{ $farm->id }}/edit">Edit</a></li>
                                    <li><a class="dropdown-item delete-btn"
                                            href="/farms/{{ $farm->id }}/destroy">Delete</a>
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
                       // Add Bootstrap 5 classes to DataTable

                });
            });
        </script>

@endsection
