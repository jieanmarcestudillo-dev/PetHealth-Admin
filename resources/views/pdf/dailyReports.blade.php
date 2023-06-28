<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Reports</title>
    <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css') }}">
</head>
{{-- STYLE --}}
<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap');

          @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap');

        .font {
            font-family: 'Roboto', sans-serif !important;
        }

        table {
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: .5rem 0;
        }

        /* img{
            position: absolute;
            right: -40px !important;
            top: -50px !important;
        } */
        .font-size {
            font-size: 14px !important;
        }

        body {
          font-family: Arial, sans-serif;
        }

        .header {
          text-align: center;
          margin-bottom: 20px;
        }

        .name {
          font-size: 24px;
          font-weight: bold;
          text-transform: uppercase;
        }

        .contact-info {
          font-size: 14px;
          margin-bottom: 10px;
          text-transform: uppercase;
          }

        .section {
          margin-bottom: 20px;
        }

        .section-title {
          font-size: 18px;
          font-weight: bold;
          margin-bottom: 10px;
          text-transform: uppercase;
        }

        .subsection-title {
          font-size: 16px;
          font-weight: bold;
          margin-bottom: 10px;
        }

        .item {
          margin-bottom: 5px;
        }

        .item-title {
          font-weight: bold;
          display: inline-block;
          width: 120px;
        }

        .item-content {
          display: inline-block;
        }

        .table{
            margin-top: -30px;
        }
</style>
{{-- STYLE --}}

<body>
    {{-- HEADER --}}
    <header class="text-center" style="">
        <img class="mb-2" src="./image/logo.png" style="width: 200px">
        <p class="m-0">Animal's Choice Veterinary Clinic</p>
        <p class="m-0">Brgy. Calapacuan, Subic, Zambales</p>
        <p class="mt-1">09354030355</p>
        {{-- <img class="logo" src="./image/logo.png" style="width: 200px"> --}}
    </header>
    {{-- HEADER --}}

    {{-- BODY --}}
    <div class="section mt-4">
        <p class="fw-bold font-size font">APPOINTMENT SUMMARY</p>
        <div class="item">
            <p class="font-size font text-uppercase">DAILY REPORT: ALL SERVICES <br> Current Date: {{$startDate}}</p>
        </div>
    </div>
    @if($data != NULL)
    <table class='table table-bordered text-center align-middle'>
        <thead>
            <tr class="font-size font">
                <th>No.</th>
                <th>Client</th>
                <th>Pet Name</th>
                <th>Pet Breed</th>
                <th>Appointment Type</th>
                <th>Name of Medicine</th>
                <th>Appointment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $count => $certainData)
            {{$count = $count + 1}}
            <tr class="font-size font">
                <td>{{$count}}</td>
                <td>{{$certainData->user_fname}} {{$certainData->user_lname}}</td>
                <td>{{$certainData->pet_name}}</td>
                <td>{{$certainData->pet_breed}}</td>
                <td>{{$certainData->pet_weight}}</td>
                <td>{{$certainData->name_of_medicine}}</td>
                <td>{{date('F d, Y | h:i: A',strtotime($certainData->app_date))}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <table class='table text-center'>
        <thead>
            <tr class="font-size font">
                <th>No.</th>
                <th>Client</th>
                <th>Pet Name</th>
                <th>Pet Breed</th>
                <th>Appointment Type</th>
                <th>Name of Medicine</th>
                <th>Appointment Date</th>
            </tr>
        </thead>
        <tbody>
            <tr class="font-size font">
                <td colspan="7">NO REPORTS FOUND</td>
            </tr>
        </tbody>
    </table>
    @endif
    {{-- BODY --}}
    <p>Generate By: {{ auth()->guard('adminModel')->user()->admin_name}}</p>
    <p style="margin-top: -10px;">Generate On: {{  date('F d, Y', strtotime(now()))}}</p>
</body>

</html>
