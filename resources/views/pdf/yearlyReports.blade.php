<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Yearly Reports</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
{{-- STYLE --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;900&display=swap');
        *{
            font-family: 'Roboto', sans-serif !important;
        }
        body {
            width: 100%;
    }
        header {
            width: 100%;
            margin-top: -2.5rem;
        }

        h1 {
            margin: 0;
            font-size: 20px;
        }

    .section {
            margin-bottom: 20px;
    }

    .body{
        margin-top: 1rem;
    }

    .section-title {
        font-size: 17px;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
    }

    .subsection-title {
        font-size: 14px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .item {
        margin-bottom: 5px;
    }

    .item-title {
        font-weight: bold;
        display: inline-block;
        width: 160px;
    }

    .item-title2{
        font-size: 14px;
        text-transform: uppercase;
        font-weight: bold;
        display: inline-block;
        width: 200px;
    }

    .item-title3{
        font-size: 14px;
        text-transform: uppercase;
        font-weight: bold;
        display: inline-block;
        width: 130px;
    }

    .item-content {
        display: inline-block;
    }

    .item-content2{
        display: inline-block;
    }

    .th1{
        width: 20%;
    }

    .logo{
        width: 80%;
    }
    .th2{
        font-weight: bold;
        line-height: 20px;
        margin-right: 2rem;
    }
    .th2 h5{
        font-weight: 500;
        letter-spacing: 1px;
        text-align: center;
        font-size:13px;
    }

    .th3{
        float: right;
        padding-left: 2rem;
        width: 20%;
    }
    </style>
{{-- STYLE --}}
<body>
        {{-- HEADER --}}
            <header>
                <table>
                    <tr>
                        <th class="th3"><img class="logo" src="./image/logo.png"></th>
                        <th class="th2">
                            <h5>COMPANY NAME</h5>
                            <h5 style="margin: 6px 2rem">COMPANY ADDRESS</h5>
                            <h5>COMPANY PHONE AND EMAIL</h5>
                        </th>
                        <th class="th3"><img class="logo" src="./image/logo.png"></th>
                    </tr>
                </table>
            </header>
        {{-- HEADER --}}

        {{-- BODY --}}
            <div class="section mt-4">
                <div class="section-title">APPOINTMENT SUMMARY</div>
                <div class="item">
                    <span class="item-title">MONTHLY REPORT:</span>
                </div>
                <div class="item">
                    <span class="item-title">Year:</span>
                    <span class="item-content">{{$year}}</span>
                </div>
            </div>
            @if(!$data->isEmpty())
            <table class='table table-bordered text-center align-middle'>
                <thead>
                    <tr>
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
                        <tr>
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
                <p>NO REPORTS FOUND</p>
            @endif
        {{-- BODY --}}
</body>
</html>
