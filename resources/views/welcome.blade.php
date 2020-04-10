<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Simple Pharmacy System</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Bootstrap cdn -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href=" {{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Styles -->
        <style>
            body {
                background-image: url("https://media2.giphy.com/media/3oz8xsV4kW2CShqVpe/giphy.gif");
                /* background-color: #fff; */
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            span{
                color: yellow;
                font-size: 80px;
            }

            .content {
                text-align: center;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links bg-warning">
                    @auth
                        <a href="{{ url('/admins') }}">Home</a>
                    @endauth
                </div>
            @endif

            <div class="content bg-info p-5 m-3 rounded-pill">
                <div class="m-b-md">
                    <h1 class="text-light font-weight-bold">
                        <span class="font-weight-bold">Simple</span> Pharmacy System</h1>
                </div>
                <a class="m-3 btn btn-light text-info font-weight-bold" 
                href="{{ route('login') }}"><i class="fas fa-users-cog text-info"></i> 
                Login As Admin</a>
                <a class="m-3 btn btn-light text-info font-weight-bold" 
                href="/pharmacy/login"><i class="fas fa-user-md text-info"></i> 
                Login As Pharmacy Owner</a>
            </div>
        </div>
    </body>
</html>
