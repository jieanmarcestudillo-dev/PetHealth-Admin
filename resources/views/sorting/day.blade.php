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
                            <h4 class="ms-2">APPOINTMENT</h4>
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
                                        <a class="nav-link" href="/adminRequestRoutes">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/adminCancelAppointment">Cancelled</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="/adminAcceptAppointment">Confirmed</a>
                                    </li>
                                    <li class="nav-item ms-auto">
                                        <a class="nav-link" href="/adminAcceptAppointment">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">This Day</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/thisWeekAppointment">This Week</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/thisMonthAppointment">This Month</a>
                                    </li>
                                </ul>
                                <table id="allThisDayAppointmentFunction" class="table table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Owner Name</th>
                                            <th class="text-center">Pet Name</th>
                                            <th class="text-center">Pet Breed</th>
                                            <th class="text-center">Type Of Treatment</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Time</th>
                                            <th class="text-center">Action</th>
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
        {{-- COMPLETE APPOINTMENT --}}
            <!-- Modal -->
            <div class="modal fade" id="completeAppointmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">COMPLETE APPOINTMENT</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="submitCompletionAppFunction" name="submitCompletionAppFunction">
                            <div class="mb-3">
                              <label class="form-label">Medicine Info</label>
                              <input type="text" class="form-control" id="nameOfMeds" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Weight:</label>
                                <input type="text" class="form-control" id="petWeight">
                            </div>
                            <p class="text-start fw-bold" id="staticBackdropLabel">SET DATE FOR THE NEXT APPOINTMENT (IF NECESSARY)</p>
                            <div class="my-3">
                                <label class="form-label">Type of Next Appointment:</label>
                                <select class="form-select" aria-label="Default select example" id="typeOfNextAppointment">
                                    <option value="None" selected>Open this select type</option>
                                    <option value="Vaccination">Vaccination</option>
                                    <option value="Deworming">Deworming</option>
                                    <option value="Heartworm Prevention">Heartworm Prevention</option>
                                    <option value="Grooming">Grooming</option>
                                    <option value="Other Treatments">Other Treatments</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Date of Next Appointment: (optional)</label>
                                <input type="date" class="form-control" id="dateOfNextAppointment">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Time of Next Appointment: (optional)</label>
                                <input type="time" class="form-control" id="timeOfNextAppointment">
                            </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">CLOSE</button>
                    <button type="submit" class="btn btn-primary rounded-0">SUBMIT</button>
                    </form>
                    </div>
                </div>
                </div>
            </div>
        {{-- COMPLETE APPOINTMENT --}}
    {{-- MODAL --}}

    {{-- JS --}}
        <script src="{{ asset('/js/dateTime.js') }}"></script>
        <script src="{{ asset('/js/sideNav.js') }}"></script>
        <script src="{{ asset('/js/logoutFunction.js') }}"></script>
        <script src="{{ asset('/js/sorting/day.js') }}"></script>
    {{-- END JS --}}
</body>
</html>
