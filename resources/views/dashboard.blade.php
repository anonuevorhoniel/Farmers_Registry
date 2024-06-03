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
    dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/assistance.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Assistances</span>
                    <span class="info-box-number">
                        {{ $assistances }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/plant.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Crops</span>
                    <span class="info-box-number">
                        {{ $crops }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/barn.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Farms</span>
                    <span class="info-box-number">
                        {{ $farms }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/farmer.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Farmers</span>
                    <span class="info-box-number">
                        {{ $farmers }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/group.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Types</span>
                    <span class="info-box-number">
                        {{ $farmerTypes }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/history.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Histories</span>
                    <span class="info-box-number">
                        {{ $histories }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><img src="{{ asset('images/city.png') }}"
                        alt=""></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Cities</span>
                    <span class="info-box-number">
                        {{ $total }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <div class="row" style="">

        <center>
            <br>

            <h4>Total Farms in Cities</h4><br>
            <br>
            <div class="row">
                <div class="col-6" style="">
                    <div class="row">
                        @if ($cities->count() > 0)
                            @foreach ($cities as $city)
                                <div class="col-4">
                                    <div class="info-box">
                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $city->name }} </span>
                                            <span class="info-box-number">
                                                {{ $city->farms->count() }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3>No cities yet</h3>
                        @endif
                    </div>
                </div>
                <div class="col-6" style="">
                    <canvas id="city_farm" style="width:100%;max-width:600px;height:300px;min-height:400px"></canvas>
                </div>
            </div>

            <hr>
            <br>
            <h4>Total Farmers in Cities</h4>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        @if ($cities->count() > 0)
                            @foreach ($cities as $city)
                                <div class="col-4">
                                    <div class="info-box">
                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $city->name }} </span>
                                            <span class="info-box-number">
                                                {{ $city->farmers_count }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3 style="">No cities yet</h3>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <canvas id="city_farmer" style="width:100%;max-width:600px;height:400px;min-height:400px"></canvas>

                </div>
            </div>
            <hr>

            <br>
            <h4>Total Assistance Histories in Cities</h4>
            <br>
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        @if ($cities->count() > 0)
                            @foreach ($cities as $city)
                                <div class="col-4">
                                    <div class="info-box">
                                        <div class="info-box-content">
                                            <span class="info-box-text">{{ $city->name }} </span>
                                            <span class="info-box-number">
                                                {{ $city->total_assistance_history }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h3 style="">No cities yet</h3>
                        @endif
                    </div>
                </div>
                <div class="col-6">
                    <canvas id="city_history" style="width:100%;height:300px;min-height:300px;min-height:400px"></canvas>
                </div>
            </div>
        </center>
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
            type: "doughnut",
            data: {
                labels: farmLabel,
                datasets: [{
                    backgroundColor: barColors,
                    data: farmVal
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Number of Farms in Cities",
                    fontSize: 23
                },
                legend: {
                    labels: {
                        fontSize: 15 // Adjust the font size of the legend
                    }

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
            type: "doughnut",
            data: {
                labels: farmLabel,
                datasets: [{
                    backgroundColor: barColors,
                    data: farmerVal
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Number of Farmers in Cities",
                    fontSize: 23
                },
                legend: {
                    labels: {
                        fontSize: 15 // Adjust the font size of the legend
                    }

                }
            }
        });


        var historyVal = [
            @foreach ($cities as $city)
                {{ $city->total_assistance_history }},
            @endforeach
        ];
        new Chart("city_history", {
            type: "doughnut",
            data: {
                labels: farmLabel,
                datasets: [{
                    backgroundColor: barColors,
                    data: historyVal
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Number of Assistance History in Cities",
                    fontSize: 23
                },
                legend: {
                    labels: {
                        fontSize: 15 // Adjust the font size of the legend
                    }

                }
            }
        });
    </script>

@endsection
