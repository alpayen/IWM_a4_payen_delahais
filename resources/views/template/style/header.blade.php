<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }} ">

    <!-- Styles -->
    <style>

        html, body {
            font-family: Source Serif Pro, PT Sans, Trebuchet MS, Helvetica, Arial;
            font-weight: 100;
            height: 100vh;
            margin: 0;
            background-color: aliceblue;
        }

        h1, h2 {
            color: #1f648b;
            margin: 1%;
        }

        .links > a {
            color: #1d658b;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .lien {
            text-align: center;
        }

        .input {
            box-sizing: border-box;
            cursor: pointer;
            padding: 0 20px;
            overflow: hidden;
            border: none;
            border-radius: 21px;
            font: normal 20px/normal "Antic", Helvetica, sans-serif;
            color: rgb(255, 255, 255);
            text-overflow: ellipsis;
            background: rgba(29, 101, 139, 0.4);
            box-shadow: 1px 1px 2px 0 rgba(0, 0, 0, 0.5) inset;
            -moz-transition: all 502ms cubic-bezier(0.68, -0.75, 0.265, 1.75);
            -o-transition: all 502ms cubic-bezier(0.68, -0.75, 0.265, 1.75);
            transition: all 502ms cubic-bezier(0.68, -0.75, 0.265, 1.75);
        }

        .submit {
            background-color: #a2c1d0;
            border-color: #a2c1d0;
        }

    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                ProdjectDev
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a>{{ Auth::user()->name }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"

                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>

                        <li><a href="{{ asset('/project') }}">Project</a></li>
                        @endguest
            </ul>
        </div>
    </div>
</nav>
