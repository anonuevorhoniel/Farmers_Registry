<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Template</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }


        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th{
            border: 2px solid black;
            text-align: center;
        }

        .centered {
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table th, .info-table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        .info-table th {
            background-color: #f2f2f2;
        }
        .info-table td {
            font-size: 14px;
        }
        .info-row {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    @php
        $total = 0;
        $dates = new DateTime($farmer->birth_date);
        $birth_date = $dates->format('F j, Y');
    @endphp
    <br><br>
    <img src="{{ $faes }}" alt="" style="float: left; width: 90px">
    <img src="{{ $laguna }}" alt="" style="float: right; width: 90px">
    <div class="centered">
        <p style="margin-bottom: -0.5%">Republic of the Philippines</p>
        <p style="margin-bottom: -0.5%">Field Agricultural Extension Services</p>
        <p style="margin-bottom: -0.5%">Office of the Provincial Agriculturist Laguna</p>
        <p>Provincial Government of Laguna</p>
    </div>
    <br>
    <p style="float: right"> Date: {{ $date }}</p>
    <br><br><br><br><br>
    <div class="centered">
        <h3 style="font-family: Arial, Helvetica, sans-serif;"> Report Title: Assistance Report for
            {{ $farmer->first_name }} {{ $farmer->middle_name }} {{ $farmer->last_name }}</h3>
        <p>Prepared by: {{ Auth::user()->name }}, Provincial Capitol of Laguna</p>
    </div>
    <br>
    <p style="text-indent: 50px">This report provides a comprehensive overview of the assistance provided to
        {{ $farmer->first_name }} . The
        goal of this report is to document the support efforts, outline the progress made, and
        highlight the impact of these initiatives on {{ $farmer->first_name }}'s agricultural productivity and
        livelihood.</p>
    <br><br><br>

    <h3>I. Assistance History</h3><br>
    <p style="text-indent: 50px">The assistance history section outlines the support and initiatives provided to each
        farmer. Below are the history of assistance provided to the farmer</p>
    <br><br>
    <table>
        <thead>
            <tr>
                <th>Assistance</th>
                <th>Given Date</th>
                <th>Value</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($farmers as $farmerss)
                <tr>
                    @php
                        $total += $farmerss->assistance->value;
                        $dates = new DateTime($farmerss->given_date);
                        $date_given = $dates->format('F j, Y');
                    @endphp
                    <td>{{ $farmerss->assistance->name }}</td>
                    <td>{{ $date_given }}</td>
                    <td>P{{ number_format($farmerss->assistance->value, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Total</th>
                <th></th>
                <th>P{{ number_format($total, 2)  }}</th>
            </tr>
        </tfoot>
    </table>
    <br><br><br><br>

    <h3>II. Personal Information</h3><br><br>
    <p style="text-indent: 50px">The personal information section details each farmer's name, contact details, and
        relevant address. This
        information is crucial for understanding the demographics and context of the agricultural community supported by
        the FAES-OPAg Laguna .</p>
    <br>
    <table class="info-table">
        <tr>
            <th>First Name:</th>
            <td> {{ $farmer->first_name }}</td>
            <th>Middle Name:</th>
            <td>{{ $farmer->middle_name }}</td>
            <th>Last Name:</th>
            <td> {{ $farmer->last_name }}</td>
        </tr>
        <tr class="info-row">
            <th>Name Extension:</th>
            <td>{{ $farmer->name_extension }}</td>
            <th>Birth Date:</th>
            <td>{{ $birth_date }}</td>
            <th>Sex:</th>
            <td>{{$farmer->sex }}</td>
        </tr>
        <tr>
            <th>Birth Place:</th>
            <td colspan="5">{{ $farmer->birth_place }}</td>
        </tr>
        <tr class="info-row">
            <th>Contact Number:</th>
            <td colspan="2"> {{ $farmer->contact_number }}</td>
            <th>Farmer Type:</th>
            <td colspan="2">{{ $farmer->farmerType->name }}</td>
        </tr>
        <tr>
            <th>Farm Name:</th>
            <td colspan="5">{{ $farmer->farm->name }}</td>
        </tr>
        <tr class="info-row">
            <th>Other Information:</th>
            <td colspan="5">{{ $farmer->other_information }}</td>
        </tr>
    </table>

    <br><br>
    <h3>III. Farm Information</h3><br><br>
    <p style="text-indent: 50px">The following section details key information about the farm managed by farmers.</p>
<table>
    <tr>
        <th>Name</th>
        <th>City / Municipality</th>
        <th>Size</th>
        <th>Crop Type</th>
    </tr>
    <tbody>
        <tr>
            <td>{{$farm->name}}</td>
            <td>{{$farm->city->name}}</td>
            <td>{{$farm->size}}</td>
            <td>
                @php
                $arr = [];
            foreach($farm->farm_crops as $crops){
                $arr[] = $crops->crop->name;
            }
           echo implode(', ', $arr);
            @endphp</td>
        </tr>
    </tbody>
</table>
</body>

</html>
