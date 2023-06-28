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
                            <h4 class="ms-2">CLIENT DETAILS</h4>
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
                                        <a class="nav-link" href="/adminClientRoutes">Owner</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">Pet</a>
                                    </li>
                                </ul>
                                <table id="petDetails" class="table table-bordered text-center align-middle">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Pet Name</th>
                                            <th class="text-center">Breed</th>
                                            <th class="text-center">Species</th>
                                            <th class="text-center">Color</th>
                                            <th class="text-center">Gender</th>
                                            <th class="text-center">Birthdate</th>
                                            <th class="text-center">Owner</th>
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
        {{-- VIEW PET DETAILS MODAL --}}
            <div class="modal fade" id="viewPetDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body m-4">
                            <div class="row">
                                <div class="col-11">
                                    <h5 class="modal-title fs-5" id="staticBackdropLabel">PET DETAILS</h5>
                                </div>
                                <div class="col-1">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            </div>
                            <div class="row mt-1 g-3">
                                <div class="col-12">
                                    <label class="form-label">Owner Name</label>
                                    <input readonly type="text" class="form-control bg-body" id="ownerName">
                                </div>
                            </div>
                            <div class="row mt-1 g-3">
                                <div class="col-4">
                                    <label class="form-label">Pet Name</label>
                                    <input readonly type="text" class="form-control bg-body" id="pet_name">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Pet Breed</label>
                                    <input readonly type="text" class="form-control bg-body" id="pet_breed">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Pet Species</label>
                                    <input readonly type="text" class="form-control bg-body" id="species">
                                </div>
                            </div>
                            <div class="row mt-1 g-3">
                                <div class="col-4">
                                    <label class="form-label">Pet Color</label>
                                    <input readonly type="text" class="form-control bg-body" id="pet_cm">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Pet Birthdate</label>
                                    <input readonly type="text" class="form-control bg-body" id="birthdate">
                                </div>
                                <div class="col-4">
                                    <label class="form-label">Pet Gender</label>
                                    <input readonly type="text" class="form-control bg-body" id="gender">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-11">
                                    <h5 class="modal-title fs-5" id="staticBackdropLabel">MEDICAL HISTORY</h5>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table table-sm table-bordered text-center align-middle mt-2">
                                    <thead>
                                        <th>No.</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Weight</th>
                                        <th>Medicine</th>
                                    </thead>
                                    <tbody id="medicalHistory" class="border-1"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {{-- VIEW PET DETAILS MODAL --}}

        {{-- SET PET APPOINTMENT --}}
            <div class="modal fade" id="setPetAppointmentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header mx-4">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">SET APPOINTMENT</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form id="submitNewAppointment">
                        <div class="modal-body mx-4">
                            <div class="mt-1 mb-3">
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
                        <div class="modal-footer mx-4">
                            <button type="button" class="btn btn-secondary rounded-0" data-bs-dismiss="modal">CLOSE</button>
                            <button type="submit" class="btn btn-primary rounded-0">SUBMIT</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        {{-- SET PET APPOINTMENT --}}
    {{-- MODAL --}}

    {{-- JS --}}
        <script src="{{ asset('/js/dateTime.js') }}"></script>
        <script src="{{ asset('/js/sideNav.js') }}"></script>
        <script src="{{ asset('/js/logoutFunction.js') }}"></script>
        <script src="{{ asset('/js/client/pet.js') }}"></script>
    {{-- END JS --}}
</body>
</html>
