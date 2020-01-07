<!doctype html>
<html lang="en" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.6">
        <title>@yield('title') - CRUD USERS</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sticky-footer-navbar/">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
        <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">


        <style>
        
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
            font-size: 3.5rem;
            }
        }

        svg{
            width: 30px;
            height: 25px;
        }

        .accions{
            width: 250px;
        }

        .table{
            width: 1000px;
        }

        #users-content{
            margin-left: 10%;
        }

        .col-8{
            margin-top: 70PX;
        }

        a:link{
            text-decoration: none;
        }

        #user-show{
            background-color: #36c2ef;
            width: 70px;
            display: block;
        }

        #user-edit{
            display: inline-block;
            background-color: #faa832;
            width: 70px;
        }

        #user-delete{
            display: inline-block;
            position: relative;
            background-color: #FC3D2E;
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            width: 70px;
        }

        .form-delete{
            position: relative;
            display: inline-block;
        }

        #update-user{
            height: 42px;
            margin-right: 15px;
        }

        .message_welcome{
            display: inline;
            position: relative;
            margin-top: 18px;
            margin-right: 15px;
            font-size: 18px;
            color: #fff;
            
        }

        .footer_align{
            margin-top: 50px;
            text-align: center;
        }

        </style>
        <!-- Custom styles for this template -->
        <link href="sticky-footer-navbar.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">
        <header>
            <!-- Fixed navbar -->
            <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                <h1 class="navbar-brand">CRUD Usuarios</h1>
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="/usuarios">Usuarios <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    {{-- <form class="form-inline mt-2 mt-md-0">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form> --}}
                </div> &nbsp;

                <p class="message_welcome">Bienvenido {{ auth()->user()->name }}</p>
                
                <div>
                    
                    <form action="{{ route('logout') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-danger btn-xs"> Cerrar sesión</button>
                    </form>
                </div>
            </nav>
            
        </header>
        <!-- Begin page content -->
        <main role="main" class="flex-shrink-0">
                <div class="row mt-4" id="users-content">
                        <div class="col-8">
                            @yield('content')
                        </div>
                        <div class="col-4">
                            @section('sidebar')
                                <h2>Barra lateral</h2>
                                
                            @show
                        </div>
                </div>
            

        </main>

        <footer class="footer mt-auto py-3 footer_align" >
            <div class="container">
                <span class="text-muted">Copyright © 2019 Yesme Morales.</span>
            </div>
        </footer>


        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
       
    </body>
</html>