@extends('layout')

@section('title')
    Dashboard
@endsection

@section('head_title')
    Dashboard
@endsection

@section('folder')
    Dashboard
@endsection

@section('file')
    Index
@endsection

@section('content')
@section('add_btn')
<label for="" style="font-size: 20px">Dashboard</label>
@endsection
    <div class="row">
        <a href="/assistances/index" style="color: black">
            <div class="col-3 hover-effect">
                <div class="info-box card-outline card-success">
                    <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/assistance.png') }}"
                            alt=""></span>

                    <div class="info-box-content">
                        <span class="info-box-text"> Assistances</span>
                        <span class="info-box-number" id="assistance">
                            <script> var assistances = {{ $assistances }};
                           $('#assistance').text(assistances.toLocaleString());
                            </script>

                        </span>
                    </div>
                </div>
        </a>
    </div>

    <div class="col-3 hover-effect">
        <a href="/croptypes/index" style="color: black">
            <div class="info-box card-outline card-success">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/plant.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Crops</span>
                    <span class="info-box-number" id="crops_content">
                        <script> var crops = {{ $crops }};
                            $('#crops_content').text(crops.toLocaleString());
                             </script>
                    </span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-3 hover-effect">
        <a href="/farms/index" style="color: black">
            <div class="info-box card-outline card-success">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/barn.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Farms</span>
                    <span class="info-box-number" id="farms_content">
                        <script> var farms =     {{ $farms }};
                            $('#farms_content').text(farms.toLocaleString());
                             </script>
                    </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-3 hover-effect">
        <a href="/farmers/index" style="color: black">
            <div class="info-box card-outline card-success">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/farmer.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Farmers</span>
                    <span class="info-box-number" id="farmers_content">
                        <script> var farmers =     {{ $farmers }};
                            $('#farmers_content').text(farmers.toLocaleString());
                             </script>
                    </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-3 hover-effect">
        <a href="/farmertypes/index" style="color: black">
            <div class="info-box card-outline card-success">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/group.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Types</span>
                    <span class="info-box-number" id="farmer_types_content">
                        <script> var farmer_types = {{ $farmerTypes }};
                            $('#farmer_types_content').text(farmer_types.toLocaleString());
                             </script>
                    </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-3 hover-effect">
        <a href="/histories/index" style="color: black">
            <div class="info-box card-outline card-success">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/history.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Histories</span>
                    <span class="info-box-number" id="histories_content">
                        <script> var histories = {{ $histories }};
                            $('#histories_content').text(histories.toLocaleString());
                             </script>
                    </span>
                </div>
            </div>
        </a>
    </div>
    <div class="col-3 hover-effect">
        <a href="/cities/index" style="color: black">
            <div class="info-box card-outline card-success">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/city.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text"> Cities / Municipalities</span>
                    <span class="info-box-number" id="total_content">
                        <script> var total = {{ $total }};
                            $('#total_content').text(total.toLocaleString());
                             </script>

                    </span>
                </div>
            </div>
        </a>
    </div>
    </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card card-tabs" style="height:100%">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="farm-tab-tab" data-toggle="pill"
                                href="#farm-tab" role="tab" aria-controls="farm-tab"
                                aria-selected="true" style="color: black">Farms</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="farmer-tab-tab" data-toggle="pill"
                                href="#farmer-tab" role="tab" aria-controls="farmer-tab"
                                aria-selected="false" style="color: black">Farmers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="assistance-histories-tab-tab" data-toggle="pill"
                                href="#assistance-histories-tab" role="tab" aria-controls="assistance-histories-tab"
                                aria-selected="false" style="color: black">Assistance Histories</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="farm-tab" role="tabpanel"
                            aria-labelledby="farm-tab-tab">
                            <center>
                                <br>
                                <h4>Farms</h4><br>
                                <div class="row">
                                    <div class="col-6 " style="">
                                        <div class="row">
                                            @if ($cities->count() > 0)
                                                @foreach ($cities as $city)
                                                    <div class="col-3 hover-effect">
                                                        <a href="/totalcities/{{ $city->id }}/farms/index"
                                                            style="color: black">
                                                            <div class="info-box card-outline card-primary">
                                                                <div class="info-box-content">
                                                                    <span class="info-box-text">{{ $city->name }}
                                                                    </span>
                                                                    <span class="info-box-number">
                                                                        {{ $city->farms->count() }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>

                                                    </div>
                                                @endforeach
                                            @else
                                                <h3>No cities yet</h3>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6" style="">
                                        <br><br><br><br><br><br>
                                        <canvas id="city_farm"
                                            style=""></canvas>
                                    </div>
                                </div>
                            </center>
                        </div>
                        <div class="tab-pane fade" id="farmer-tab" role="tabpanel"
                            aria-labelledby="farmer-tab-tab">
                            <center>
                                <br>
                                <h4>Farmers</h4>
                                <br>
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="row">
                                            @if ($cities->count() > 0)
                                                @foreach ($cities as $city)
                                                    <div class="col-3 hover-effect">
                                                        <a href="/totalcities/{{ $city->id }}/farmers/index"
                                                            style="color: black">
                                                            <div class="info-box card-outline card-warning">
                                                                <div class="info-box-content">
                                                                    <span class="info-box-text">{{ $city->name }}
                                                                    </span>
                                                                    <span class="info-box-number">
                                                                        {{ $city->farmers_count }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h3 style="">No cities yet</h3>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 ">
                                        <br><br><br><br><br><br>
                                        <canvas id="city_farmer"
                                            style=""></canvas>
                                    </div>
                                </div>
                            </center>

                        </div>
                        <div class="tab-pane fade" id="assistance-histories-tab" role="tabpanel"
                            aria-labelledby="assistance-histories-tab-tab">

                            <center>
                                <br>
                                <h4>Assistance Histories</h4>
                                <br>
                                <div class="row">
                                    <div class="col-6 ">
                                        <div class="row">
                                            @if ($cities->count() > 0)
                                                @foreach ($cities as $city)
                                                    <div class="col-3 hover-effect">
                                                        <a href="/totalcities/{{ $city->id }}/histories/index"
                                                            style="color: black">

                                                            <div class="info-box card-outline card-danger">
                                                                <div class="info-box-content">
                                                                    <span class="info-box-text">{{ $city->name }}
                                                                    </span>
                                                                    <span class="info-box-number">
                                                                        {{ $city->total_assistance_history }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @else
                                                <h3 style="">No cities yet</h3>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <br><br><br><br><br><br>
                                        <canvas id="city_history"
                                            style=""></canvas>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function generateColors(numColors) {
                const colors = [];
                for (let i = 0; i < numColors; i++) {
                    const hue = (i * 137.508) % 360; // Golden angle in degrees
                    colors.push(`hsl(${hue}, 70%, 50%)`); // Using HSL color model
                }
                return colors;
            }
            const farmLabel = [
                @foreach ($cities as $city)
                    '{{ $city->name }}',
                @endforeach
            ];
            console.log(farmLabel);
            const barColors = generateColors(farmLabel.length);
            const farmVal = [
                @foreach ($cities as $city)
                    {{ $city->farms->count() }},
                @endforeach
            ];
            //farm chart
            new Chart("city_farm", {
                type: "bar",
                data: {
                    labels: farmLabel,
                    datasets: [{
                        backgroundColor: barColors,
                        data: farmVal
                    }]
                },
                options: {
                    title: {
                        display: false,
                        text: "Number of Farms in Cities",
                        fontSize: 23
                    },
                    legend: {
                        display: false,


                    }
                }
            });
            //farmer chart
            var farmerVal = [
                @foreach ($cities as $city)
                    {{ $city->farmers_count }},
                @endforeach
            ];
            new Chart("city_farmer", {
                type: "bar",
                data: {
                    labels: farmLabel,
                    datasets: [{
                        backgroundColor: barColors,
                        data: farmerVal
                    }]
                },
                options: {
                    title: {
                        display: false,
                        text: "Number of Farmers in Cities",
                        fontSize: 23
                    },
                    legend: {
                        display: false,


                    }
                }
            });


            var historyVal = [
                @foreach ($cities as $city)
                    {{ $city->total_assistance_history }},
                @endforeach
            ];
            new Chart("city_history", {
                type: "bar",
                data: {
                    labels: farmLabel,
                    datasets: [{
                        backgroundColor: barColors,
                        data: historyVal
                    }]
                },
                options: {
                    title: {
                        display: false,
                        text: "Number of Assistance History in Cities",
                        fontSize: 23
                    },
                    legend: {
                        display: false,


                    }
                }
            });
        </script>
        <style>
            .hover-effect {
                transition: transform 0.3s ease;
            }

            .hover-effect:hover {
                transform: scale(1.04);
                /* Adjust the scale factor as needed */
            }
        </style>

    @endsection
