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
                            {{-- <button class="btn btn-lg" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button> --}}
                            <h4 class="ms-2">COMPLETED APPOINTMENT</h4>
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
                        <div class="container-fluid">
                            <div class="container-fluid bg-light px-5 py-4 bg-body rounded shadow-lg">
                                <ul class="nav nav-tabs mb-4 reportsLink">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/adminReportRoutes">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/vaccinationReports">Vaccination</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/dewormingReports">Deworming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/heartWormReports">Heartworm Prevention</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/groomingReports">Grooming</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/otherReports">Other Treatment</a>
                                    </li>
                                    <li class="nav-item ms-auto">
                                        <button type="button" class="btn btn-outline-secondary btn-sm px-4 py-2 rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal">Generate Reports</button>
                                    </li>
                                </ul>
                                <table id="allReports" class="table table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Client</th>
                                            <th class="text-center">Pet Name</th>
                                            <th class="text-center">Pet Breed</th>
                                            <th class="text-center">Pet Weight</th>
                                            <th class="text-center">Date Admitted</th>
                                            <th class="text-center">Date Completed</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                {{-- MAIN CONTENT --}}
            </div>
        {{-- END MAIN CONTENT --}}
    </div>

    {{-- MODAL --}}
        {{-- CHOOSE CAT --}}
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5">Generate Reports</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="row text-center">
                        <div class="col-3">
                            <a href='printDailyReports/' class='btn rounded-0 px-4 btn-outline-secondary'>Daily</a>
                        </div>
                        <div class="col-3">
                            <a href='printWeeklyReports/' class='btn rounded-0 px-4 btn-outline-secondary'>Weekly</a>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn rounded-0 px-4 btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#monthlyReport">Monthly</button>
                        </div>
                        <div class="col-3">
                            <button type="button" class="btn rounded-0 px-4 btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#yearlyReport">Yearly</button>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        {{-- CHOOSE CAT --}}

        {{-- MONTHLY --}}
            <div class="modal fade" id="monthlyReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Monthly Report</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id='selectMonthReports' name='selectMonthReports' method="POST" action="/printMonthlyReports">
                @csrf
                <div class="modal-body">
                   <div class="row">
                    <div class="col-6">
                        <label for="exampleFormControlInput1" class="form-label">Select Month</label>
                        <select class="form-select" aria-label="Default select example" name="month" id="month" required>
                            <option selected>Open this select month</option>
                            <option value="January">January</option>
                            <option value="February">February</option>
                            <option value="March">March</option>
                            <option value="April">April</option>
                            <option value="May">May</option>
                            <option value="June">June</option>
                            <option value="July">July</option>
                            <option value="August">August</option>
                            <option value="September">September</option>
                            <option value="October">October</option>
                            <option value="November">November</option>
                            <option value="December">December</option>
                        </select>
                    </div>
                        <div class="col-6">
                            <label for="exampleFormControlInput1" class="form-label">Select Year</label>
                            <select class="form-select" aria-label="Default select example" name="year" id="year" required>
                                <option selected>Open this select year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                </div>
                </form>
                </div>
            </div>
            </div>
        {{-- MONTHLY --}}

        {{-- YEARLY --}}
            <div class="modal fade" id="yearlyReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Yearly Report</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id='selectYearReports' name='selectYearReports' method="POST" action="/printYearlyReports">
                    @csrf
                    <div class="modal-body">
                    <div class="row">
                        <div class="col-7">
                            <label for="exampleFormControlInput1" class="form-label">Select Year</label>
                            <select class="form-select rounded-0" aria-label="Default select example" name="year" id="year" required>
                                <option selected>Open this select year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="exampleFormControlInput1" class="form-label me-5 pe-5">Action</label>
                            <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary rounded-0">Submit</button>
                        </div>
                        </div>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        {{-- YEARLY --}}
    {{-- MODAL --}}

    {{-- JS --}}
        <script src="{{ asset('/js/dateTime.js') }}"></script>
        <script src="{{ asset('/js/sideNav.js') }}"></script>
        <script src="{{ asset('/js/logoutFunction.js') }}"></script>
        <script src="{{ asset('/js/reports/all.js') }}"></script>
    {{-- END JS --}}
</body>
</html>
