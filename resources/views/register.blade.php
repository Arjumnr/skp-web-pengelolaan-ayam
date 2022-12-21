<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gogi - Admin and Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('templates/assets/media/image/favicon.png') }}"/>

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
        <img src="{{ asset('templates/assets/media/image/dark-logo.png') }}" alt="image">
    </div>
    <!-- ./ logo -->

    
    <h5>Create account</h5>

    <!-- form -->
    <form>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Firstname" required autofocus>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Lastname" required>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" required>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required>
        </div>
        <button class="btn btn-primary btn-block">Register</button>
        <hr>
        <p class="text-muted">Already have an account?</p>
        <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Sign in!</a>
    </form>
    <!-- ./ form -->


</div>

<!-- Plugin scripts -->
<script src="{{ asset('templates/vendors/bundle.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('templates/assets/js/app.min.js') }}"></script>
</body>
</html>
