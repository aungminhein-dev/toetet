<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>ToeTet - @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('storage/logo/toetet.svg') }}">

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{asset('admin/assets/plugins/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/plugins/feather/feather.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/plugins/icons/flags/flags.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
    <style>
        .btn-primary {
            background-color: #18395b!important;
            border-color : #18395b !important ;
        }
        .btn-toetet{
            background-color:  #41B883  !important;
            border-color:  #41B883  !important;
            color: #ffff;
        }
        .text-toetet {
            color : #41B883;
        }
    </style>

</head>

<body>
    @yield('content')

    <script src="{{asset('admin/assets/js/jquery-3.6.0.min.js')}}"></script>

    <script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/feather.min.js')}}"></script>

    <script src="{{asset('admin/assets/js/script.js')}}"></script>
</body>

</html>
