<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASM Cursos</title>
    
    <!-- CSS Files -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/r-2.2.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/af-2.3.4/r-2.2.3/datatables.min.js"></script>
 
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
                <a class="navbar-brand" style="display:none;"></a>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">
                            <i class="fas fa-home"></i>
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href={{ route("usuarios.index") }}>
                            <i class="fas fa-users"></i>
                            Usuarios
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-table"></i>
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
                <ul class="navbar-nav ml-auto nav-flex-icons">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user"></i>
                        {{ Auth::user()->name }}
                        {{ Auth::user()->role->descripcion }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                        <a class="dropdown-item" href={{route("usuarios.show",Auth::user())}} >Mi Perfil</a>
                        <form class="form-inline" id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                                <button type="submit" style="border: 0;">
                                <a class="dropdown-item">
                                    {{ __('CERRAR SESIÓN') }}
                                </a>
                                </button>             
                        </form>
                    </div>
                </li>
                </ul>
            </div>
        </nav>

        @yield('content')

    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable( {
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            } );

        } );
    </script>
</body>
</html>