<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ELBO</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css" integrity="sha384-xxzQGERXS00kBmZW/6qxqJPyxW3UR0BPsL4c8ILaIWXva5kFi7TxkIIaMiKtqV1Q" crossorigin="anonymous">

    
</head>
<body>
    <div id="app">

        <div class="containder-fluid">
            <div class="row">
                @auth
                <nav class="navbar navbar-dark bg-dark shadow-sm flex-md-nowrap col-12 d-md-none">
                    <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand mx-4 mt-1" href="#">ELBO</a> 
                </nav>
                <nav id="sidebar" class="col-md-2 col-lg-2 d-md-block bg-dark sidebar collapse">
                
                    <div class="side-sticky pt-3">
                    <a class="navbar-brand mx-4 mb-4 d-none d-md-block" href="#">ELBO</a>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/projectApp/projects/activeProjects">Bauprojekte</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/shiftplan">Dienstplan</a>
                            </li>
                        </ul>
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown">
                                Profil
                            </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                        </div>
                    </div>
                </nav>    
                @endauth

                
                <main class="col-md-10 col-lg-10 mt-3">
                    
                        @yield('content')
                    
                </main>
                
                
            
            
            </div>
        </div>
       


       
    
    
    
    </div>
    
        
        
        

        
    </div>
</body>
</html>
