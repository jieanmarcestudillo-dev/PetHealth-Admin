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
                                <a class="nav-link active" href="#">Owner</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/adminOwnersPet">Pet</a>
                            </li>
                        </ul>
                        <table id="clientDetails" class="table table-bordered text-center align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th class="text-center">Full Name</th>
                                    <th class="text-center">Contact</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Address</th>
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
    <div class="modal fade" id="viewClientDetails" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body m-4">
                    <div class="row">
                        <div class="col-11">
                            <h5 class="modal-title fs-5" id="staticBackdropLabel">OWNER DETAILS</h5>
                        </div>
                        <div class="col-1">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="row mt-1 g-3">
                        <div class="col-6">
                            <label class="form-label">First Name</label>
                            <input readonly type="text" class="form-control bg-body" id="firstName">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Last Name</label>
                            <input readonly type="text" class="form-control bg-body" id="lastName">
                        </div>
                    </div>
                    <div class="row mt-1 g-3">
                        <div class="col-12">
                            <label class="form-label">Address</label>
                            <input readonly type="text" class="form-control bg-body" id="address">
                        </div>
                    </div>
                    <div class="row mt-1 g-3">
                        <div class="col-6">
                            <label class="form-label">Contact</label>
                            <input readonly type="text" class="form-control bg-body" id="contact">
                        </div>
                        <div class="col-6">
                            <label class="form-label">Email</label>
                            <input readonly type="text" class="form-control bg-body" id="email">
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-11">
                            <h5 class="modal-title fs-5" id="staticBackdropLabel">PET DETAILS</h5>
                        </div>
                    </div>
                    <div class="row">
                        <table class="table table-bordered text-center mx-1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Species</th>
                                    <th>Breed</th>
                                    <th>Color</th>
                                    <th>Birth Date</th>
                                </tr>
                            </thead>
                            <tbody id="ownerPet">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- MODAL --}}

    {{-- JS --}}
    <script src="{{ asset('/js/dateTime.js') }}"></script>
    <script src="{{ asset('/js/sideNav.js') }}"></script>
    <script src="{{ asset('/js/logoutFunction.js') }}"></script>
    <script src="{{ asset('/js/client/client.js') }}"></script>
    {{-- END JS --}}
</body>

</html>
