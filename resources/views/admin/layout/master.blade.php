<!DOCTYPE html>
<html>
    <head>
         <meta charset="UTF-8" />
         <title></title>
         <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/jquery-ui.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/jquery.selectBoxIt.css')}}">
         <link rel="stylesheet" href="{{ URL::asset('css/control.css')}}">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container">
                <a class="navbar-brand" href="dashboard.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link "  href="adminUsers">users</a></li>
                    <li class="nav-item"><a class="nav-link "  href="adminCompanies">companies</a></li>
                    <li class="nav-item"><a class="nav-link "  href="adminJobs">jobs</a></li>
                    <li class="nav-item"><a class="nav-link "  href="adminDetails">Details Jobs</a></li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    khalifa
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../index.php">Visit Shop</a></li>
                        <li><a class="dropdown-item" href="members.php?do=Edit&userid=">
                            khalifa
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#"></a></li>
                        <li><a class="dropdown-item" href="logout.php"></a></li>
                    </ul>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

        @yield('showusers')
        @yield('showcompanies')
        @yield('showjobs')
        @yield('showdetails')

        <div clase="footer">
            
        </div>
        <script src="{{ URL::asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{ URL::asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ URL::asset('js/jquery.selectBoxIt.min.js')}}"></script>
        <script src="{{ URL::asset('js/control.js')}}"></script>
    </body>
</html>