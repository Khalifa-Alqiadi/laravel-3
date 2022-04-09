<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
</head>

<body>

<div class="upper-bar">
        <div class="container">
            @if(isset($_SESSION['user']))
            <div class="navbar navbar-expand-lg session-user">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                    <img src="img.png" class="img-thumbnail img-circle" alt="" />
                    <li class="nav-item dropdown">
                        <a class="btn btn-default  nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{$_SESSION['user']}}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="userDashboard">myDashboard</a></li>
                            <li><a class="dropdown-item" href="logout">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            @else
            <a href="showLogin">
                <span class="login-header pull-right" >Login/Signup</span>
            </a>
            @endif
            
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">YemenUp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="include/jobs.html">All Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="companies">All Comps</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="include/about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/include/contact.html">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    @yield('slider')
    
    <!-- @yield('index') -->

    
    @yield('ads')
    <section id="card" class="container">
        @yield('crad')
    </section>
    
    <section id="all-comp">
        @yield('AllComps')
    </section>
    @yield('details')
    @yield('login')
    <!-- Start Footer Section -->
<section id="footer" class="bg-dark">
        <div class="footer">
            <h1>Yemen UP</h1>
            <div class="icons">
                <img src="{{ URL::asset('images/icon.png')}}" alt="" srcset="">
                <img src="{{ URL::asset('images/icon1.png')}}" alt="" srcset="">
                <img src="{{ URL::asset('images/icon2.png')}}" alt="" srcset="">
                <img src="{{ URL::asset('images/icon3.png')}}" alt="" srcset="">
            </div>
            <p>Copyright &copy YemenUP</p>
        </div>
    </section>
    <!-- End Footer Section -->

    <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/login.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>

</body>
</html>