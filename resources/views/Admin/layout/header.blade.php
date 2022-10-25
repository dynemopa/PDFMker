<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
  margin-left: 0px; /* Same as the width of the sidenav */
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.active
{
    color: red;
}
.navlink
{
    font-size: 30px;
}
.active
{
    background-color: yellow;
}
</style>
</head>
<body style="background-color: #faecd0;">
    <div class="col-md-12">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
    
                    </ul>
    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto" >
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
                                <a style=" margin-left:100%" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a onclick="return confirm('Are you sure?')" class="dropdown-item" href="{{url('logout-admin')}}">
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
            <a class=" {{request()->is('home') ? 'active' : '' }} "  href="{{url('home') }}"><i style="color: white" class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;Dashboard</a>
            <a  class=" {{request()->is('users') ? 'active' : '' }} "  href="{{url('users')}}"><i style="color: white" class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;Users</a>
            <a  class=" {{request()->is('profile') ? 'active' : '' }} "  href="{{url('profile')}}"><i style="color: white" class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Profile</a>
            <a  class=" {{request()->is('changepassword') ? 'active' : '' }} "  href="{{url('changepassword')}}"><i style="color: white" class="fa fa-key" aria-hidden="true"></i>&nbsp;&nbsp;Change Password</a>
            <a onclick="return confirm('Are you sure?')"   href="{{url('logout-admin')}}"><i style="color: white" class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;Logout</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="main">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html> 