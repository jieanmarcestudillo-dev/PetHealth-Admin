<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/sideBar.css') }}" rel="stylesheet">
    <title>Animal's Choice</title>
    {{-- CSS --}}
    @include('global')
    {{-- CSS --}}
</head>
<body>
    <div class="d-flex" id="wrapper">
        {{-- SIDE NAV --}}
            @include('sidebar')
        {{-- SIDE NAV --}}

        {{-- MAIN CONTENT --}}
            <div id="page-content-wrapper">
                {{-- NAV BAR --}}
                    <nav class="navbar navbar-expand-lg text-white border-bottom">
                        <div class="container-fluid">
                            {{-- <button class="btn btn-lg px-4 m-0" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button> --}}
                            <h4 class="ms-2">DASHBOARD</h4>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto">
                                    <li>
                                        <a class="nav-link me-3">
                                            <span>{{ auth()->guard('adminModel')->user()->admin_name}}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                {{-- NAV BAR --}}

                {{-- MAIN CONTENT --}}
                <div class="container-fluid mainBar">
                    <div class="row mb-3">
                        <div class="col-3">
                            <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 text-center">
                                            <i class="bi bi-briefcase"></i>
                                        </div>
                                        <div class="col-10 text-center" style="line-height:19px; padding-top:1.5rem">
                                            <p class="card-text fw-bold" style="font-size: 2rem; color:#BF622A;" id="totalCompletedAppointment"></p>
                                            <p class="card-text fw-bold" style="font-size: 12px; color:#BF622A;">COMPLETED APPOINTMENT</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3 text-start">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        <div class="col-9 text-center" style="line-height:19px; padding-top:1.5rem">
                                            <p class="card-text fw-bold pe-2" style="font-size: 2rem; color:#BF622A;" id="totalClientRegistered"></p>
                                            <p class="card-text fw-bold" style="font-size: 12px; letter-spacing:1px; color:#BF622A;">TOTAL CLIENT</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 text-start">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                        <div class="col-10 text-center" style="line-height:19px; padding-top:1.5rem">
                                            <p class="card-text fw-bold pe-2" style="font-size: 2rem; color:#BF622A;" id="totalPendingAppointment"></p>
                                            <p class="card-text fw-bold" style="font-size: 12px; letter-spacing:1px; color:#BF622A;">PENDING APPOINTMENT</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card shadow" style="height:8rem; border-radius:10px; background-color:#ffff;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-2 text-start">
                                            <i class="bi bi-people-fill"></i>
                                        </div>
                                        <div class="col-10 text-center" style="line-height:19px; padding-top:1.5rem">
                                            <p class="card-text fw-bold pe-2" style="font-size: 2rem; color:#BF622A;" id="totalAcceptAppointment"></p>
                                            <p class="card-text fw-bold" style="font-size: 12px; letter-spacing:1px; color:#BF622A;">TOTAL SCHEDULE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 mt-2 border-2 shadow">
                        <div class="card p-4" id="visualization">
                            <H5>APPOINTMENT REPORT</H5>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card p-4">
                                <h5 class="text-uppercase text-center">THE MOST COMMON TYPE OF SERVICE</h5>
                                <div class="card p-4" id="service">
                                    <canvas id="pieService"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card p-4">
                                <h5 class="text-uppercase text-center">THE MOST COMMON TYPE OF BREED</h5>
                                <div class="card p-4" id="breed" >
                                    <canvas id="pieBreed"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                {{-- MAIN CONTENT --}}
            </div>
        {{-- END MAIN CONTENT --}}
    </div>

    {{-- JS --}}
        <script src="{{ asset('/js/dateTime.js') }}"></script>
        <script src="{{ asset('/js/sideNav.js') }}"></script>
        <script src="{{ asset('/js/dashboard/visualization.js') }}"></script>
        <script src="{{ asset('/js/logoutFunction.js') }}"></script>
    {{-- END JS --}}
</body>
</html>
