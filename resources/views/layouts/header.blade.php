<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 300px;
            position: fixed;
            z-index: 1;

            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .sidenav a {
            padding: 6px 6px 6px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .main {
            margin-left: 0px;
            /* Same as the width of the sidenav */
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .active {
            color: red;
        }

        .navlink {
            font-size: 30px;
        }
        .active
        {
            background-color: yellow;
        }
    </style>
</head>

<body style="background-repeat: no-repeat;background-size: cover; background-image:url('data:image/jpeg;base64,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')">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a style=" margin-left:100%" id="navbarDropdown" class="nav-link dropdown-toggle"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a onclick="return confirm('Are you sure?')" class="dropdown-item" href="{{url('logout-')}}">
                                        Logout
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3">
                <div class="sidenav">
                    <a class="{{request()->is('home2') ? 'active' : '' }}"  href="{{ url('home2') }}"><i style="color: white" class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;   Dashboard</a>
                    <a class="{{request()->is('generate') ? 'active' : '' }}" href="{{ url('generate') }}"><i style="color: white" class="fa fa-plus" aria-hidden="true"></i> &nbsp;&nbsp; Generate PDF</a>
                    <a class="{{request()->is('pdf_view') ? 'active' : '' }}" href="{{ url('pdf_view') }}"><i style="color: white" class="fa fa-eye" aria-hidden="true"></i> &nbsp;&nbsp; PDF View</a>
                    <a class="{{request()->is('logout-user') ? 'active' : '' }}" onclick="return confirm('Are you sure?')"href="{{ url('logout-user') }}"><i style="color: white" class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;&nbsp;Logout</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="main">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script>
        CKEDITOR.replace('summarycontent');
    </script>
    <script>
        CKEDITOR.replace('twoweekcontent');
    </script>

    <script>
        CKEDITOR.replace('tasks_issue');
    </script>
</body>

</html>
