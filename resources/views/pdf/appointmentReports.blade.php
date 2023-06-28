<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Reports</title>
    <link rel="stylesheet" href="{{ public_path('css/bootstrap.min.css') }}">
</head>
{{-- STYLE --}}
    <style>
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

    </style>
{{-- STYLE --}}
<body>
    {{-- HEADER --}}
        <header class="text-center" style="">
            <img class="mb-2" src="./image/logo.png" style="width: 200px">
            <p class="m-0">Animal's Choice Veterinary Clinic</p>
            <p class="m-0">Brgy. Calapacuan, Subic, Zambales</p>
            <p class="mt-1">09354030355</p>
        </header>
    {{-- HEADER --}}

    {{-- BODY --}}
    @foreach($data as $count => $certainData)
        <div class="section mt-4">
            <div class="section-title">APPOINTMENT SUMMARY</div>
        </div>
        <div class="section">
        <div class="section-title">Profile Summary</div>
        <div class="item">
          <span class="item-title">Last Name:</span>
          <span class="item-content">{{$certainData->user_lname}}</span>
        </div>
        <div class="item">
            <span class="item-title">First Name:</span>
            <span class="item-content">{{$certainData->user_fname}}</span>
          </div>
          <div class="item">
            <span class="item-title">Contact:</span>
            <span class="item-content">{{$certainData->contact}}</span>
          </div>
        <div class="item">
          <span class="item-title">Email Address:</span>
          <span class="item-content">{{$certainData->email}}</span>
        </div>
      </div>
      <div class="section">
        <div class="section-title">Pet Information</div>
        <div class="item">
          <span class="item-title">Pet Name:</span>
          <span class="item-content">{{$certainData->pet_name}}</span>
        </div>
        <div class="item">
          <span class="item-title">Color:</span>
          <span class="item-content">{{$certainData->pet_cm}}</span>
        </div>
        <div class="item">
          <span class="item-title">Breed:</span>
          <span class="item-content">{{$certainData->pet_breed}}</span>
        </div>
        <div class="item">
          <span class="item-title">Species:</span>
          <span class="item-content">{{$certainData->species}}</span>
        </div>
        <div class="item">
          <span class="item-title">Gender:</span>
          <span class="item-content">{{$certainData->gender}}</span>
        </div>
    </div>
    @endforeach
    {{-- BODY --}}
    <p>Generate By: {{ auth()->guard('adminModel')->user()->admin_name}}</p>
    <p style="margin-top: -10px;">Generate On: {{  date('F d, Y', strtotime(now()))}}</p>
</body>
</html>
