<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gogi - Admin and Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('templates/assets/media/image/favicon.png') }}" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('templates/vendors/bundle.css') }}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('templates/assets/css/app.min.css') }}" type="text/css">
</head>

<body class="form-membership">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->

    <div class="form-wrapper">

        <!-- logo -->
        <div id="logo">
            <img src="templates/assets/media/image/dark-logo.png" alt="image">
        </div>
        <!-- ./ logo -->


        <h5>Sign in</h5>
        @if (Session::has('danger'))
            <div class="alert alert-danger">
                {{ Session::get('danger') }}
                @php
                    Session::forget('danger');
                @endphp
            </div>
        @endif
        <!-- form -->
        <form method="POST" action="{{ route('loginPost') }}">
            @csrf
            <div class="form-group">
                <input type="text" id="username" name="username" class="form-control" placeholder="Username"
                    autofocus>
                @if ($errors->has('username'))
                    <span class="text-danger">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>


            <button class="btn btn-primary btn-block">Sign in</button>
            <hr>

            <p class="text-muted">Don't have an account?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">Register now!</a>
        </form>
        <!-- ./ form -->


    </div>

    <!-- Plugin scripts -->
    <script src="{{ asset('templates/vendors/bundle.js') }}"></script>

    <!-- App scripts -->
    <script src="{{ asset('templates/assets/js/app.min.js') }}"></script>
</body>

</html>
