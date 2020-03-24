<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    
</head>
<body>
    
    
    <div class="contenedor-fluid">

        <header>
            <nav class="navegacion row">
                <img src="../img/header.jpg" alt="header">
            </nav>
        </header>
    
    </div>
      
        {{--<nav class="navegacion2">
            <div class="row">
                <div class="col-md-2">
                    <ul class="menu2">
                        <li><a href="#">(INICIO)</a></li>
                    
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="menu2">
                        <li><a href="#">EVALUACION</a></li>
                    
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="menu2">
                        <li><a href="#">USUARIOS</a></li>
                    
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="menu2">
                        <li><a href="#">PROYECTOS</a></li>
                    
                    </ul>
                </div>
                <div class="col-md-2">        
                    <ul class="menu2">
                        <li><a href="#">(NOTIF)</a></li>
                    
                    </ul>
                </div>
                <div class="col-md-2">
                    <ul class="menu2">
                        <li><a href="#">(USER)</a></li>
                    </ul>  
                </div>

            </div>
        </nav>--}}

        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(40, 146, 157);">
        
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand"></a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Usuarios</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Cursos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
        </nav>

        @yield('content')


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>