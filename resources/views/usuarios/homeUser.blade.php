@extends('layouts.menu')
@section('content')
{{--
<br>
<br>
<div class="row cursos">
<div class="col-md-4">
    <ul class="menu2">
        <li><div class="card" style="width: 18rem">
            <img class="card-img-top" src="../img/lala.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Nombre Curso</h5>
                <p class="card-text">Descripción</p>
                <a href="#" class="btn verde">Entrar</a>
            </div>
            </div></li>
    
    </ul>
</div>
<div class="col-md-4">
    <ul class="menu2">
        <li><div class="card" style="width: 18rem;">
        <img class="card-img-top" src="../img/lala.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Nombre Curso</h5>
                <p class="card-text">Descripción</p>
                <a href="#" class="btn verde">Entrar</a>
            </div>
            </div></li>
    </ul>
</div>
<div class="col-md-4">
    <ul class="menu2">
        <li>
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../img/lala.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Curso</h5>
                    <p class="card-text">Descripción</p>
                    <a href="#" class="btn verde">Entrar</a>
                </div>
            </div>
        </li>
    </ul>
</div>
<br>
<a href="#" class="btn btn-secondary nuevo">Nuevo curso</a>
</div>
--}}
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                            <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p> 
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <button type="button" class="btn btn-asm" data-toggle="modal" data-target="#exampleModal">
                    Inscribirse
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inscripción</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Quieres inscribirte al curso "$Nombre del curso"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                            <button type="button" class="btn btn-success">SI</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                             <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <button type="button" class="btn btn-asm" data-toggle="modal" data-target="#exampleModal">
                    Inscribirse
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inscripción</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Quieres inscribirte al curso "$Nombre del curso"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                            <button type="button" class="btn btn-success">SI</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                             <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <button type="button" class="btn btn-asm" data-toggle="modal" data-target="#exampleModal">
                    Inscribirse
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inscripción</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Quieres inscribirte al curso "$Nombre del curso"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                            <button type="button" class="btn btn-success">SI</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                             <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-asm" data-toggle="modal" data-target="#exampleModal">
                    Inscribirse
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inscripción</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ¿Quieres inscribirte al curso "$Nombre del curso"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                            <button type="button" class="btn btn-success">SI</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection