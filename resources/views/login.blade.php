<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Animal's Choice</title>
    {{-- CSS --}}
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    @include('global')
    {{-- CSS --}}
</head>
<body>
    <div class="container mt-lg-5 pt-lg-1">
        <div class="row mt-lg-5">
            <div class="col-4 mx-auto">
                <div class="card rounded-0">
                    <div class="card-body">
                        <div class="row text-center">
                            <img class="border-0 logo img-thumbnail mx-auto" src="{{ URL('/image/logo.png')}}">
                            <h5 class="my-2">Pet Health Information System and Scheduler</h5>
                            <p>Please enter your credentials</p>
                        </div>
                        <form name="loginForm" id="loginForm">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control rounded-0" name="email" id="email" placeholder="Email" required>
                                <label for="floatingInput" class="text-muted">Email</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control rounded-0" name="password" id="password" placeholder="Password" required>
                                <label for="floatingInput" class="text-muted">Password</label>
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" onclick="seePassword()">
                              <label class="form-check-label">Show Password</label>
                            </div>
                            <div class="alert alert-danger text-center rounded-0 d-none" role="alert">
                                Sorry, Login Failed Wrong Username or Password
                            </div>
                            <div class="row mx-1 mt-4">  
                                <button type="submit" class="btn rounded-0">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS --}}
        <script src="{{ asset('/js/loginFunction.js') }}"></script>
    {{-- JS --}}
</body>
</html>