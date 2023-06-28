<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monthly Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
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
            <p class="font-size font text-uppercase">MONTHLY REPORT: ALL SERVICES <br> MONTH: {{$month}} {{$year}}</p>
        </div>
    </div>
    @if(!$data->isEmpty())
    <table class='table table-bordered text-center align-middle'>
        <thead>
            <tr class="font-size font">
                <th>No.</th>
                <th>Client</th>
                <th>Pet Name</th>
                <th>Pet Breed</th>
                <th>Appointment Type</th>
                <th>Appointment Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $count => $certainData)
            <tr class="font-size font">
                <td>{{ $count + 1 }}</td>
                <td>{{ $certainData->user_fname }} {{ $certainData->user_lname }}</td>
                <td>{{ $certainData->pet_name }}</td>
                <td>{{ $certainData->pet_breed }}</td>
                <td>{{ $certainData->app_type }}</td>
                <td>{{ date('F d, Y', strtotime($certainData->app_date)) }}</td>
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
