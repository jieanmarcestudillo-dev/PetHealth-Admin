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
                                            <th class="text-center col-4">Address</th>
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

    {{-- JS --}}
        <script src="{{ asset('/js/dateTime.js') }}"></script>
        <script src="{{ asset('/js/sideNav.js') }}"></script>
        <script src="{{ asset('/js/logoutFunction.js') }}"></script>
        <script src="{{ asset('/js/client/client.js') }}"></script>
    {{-- END JS --}}
</body>
</html>