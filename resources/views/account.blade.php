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
                            <h4 class="ms-2">MANAGE ACCOUNT</h4>
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
                        <div class="row">
                            <div class="col-4 mx-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row text-center">
                                            <h5 class="my-2">Pet Health Information System and Scheduler</h5>
                                        </div>
                                        <form name="loginForm" id="loginForm">
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control rounded-0 bg-body" name="" id="" value="{{ auth()->guard('adminModel')->user()->admin_name}}" placeholder="Full Name" readonly>
                                                <label for="floatingInput" class="text-muted">Full Name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" class="form-control rounded-0 bg-body" name="" id="" value="{{ auth()->guard('adminModel')->user()->email}}" placeholder="Email Address" readonly>
                                                <label for="floatingInput" class="text-muted">Email Address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control rounded-0" name="oldPassword" id="oldPassword" placeholder="Old Password" required>
                                                <label for="floatingInput" class="text-muted">Old Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control rounded-0" name="newPassword" id="newPassword" placeholder="New Password" required>
                                                <label for="floatingInput" class="text-muted">New Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="Confirm Password" required>
                                                <label for="floatingInput" class="text-muted">Confirm Password</label>
                                            </div>
                                            <div class="mb-3 form-check">
                                              <input type="checkbox" class="form-check-input" onclick="seePassword()">
                                              <label class="form-check-label">Show Password</label>
                                            </div>
                                            <div class="alert alert-danger text-center rounded-0 d-none" role="alert">
                                                Sorry, Login Failed Wrong Username or Password
                                            </div>
                                            <div class="row mx-1 mt-4">  
                                                <button type="submit" class="btn rounded-0 mngButton">Save Changes</button>
                                            </div>
                                        </form>
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
        <script src="{{ asset('/js/logoutFunction.js') }}"></script>
    {{-- END JS --}}
</body>
</html>