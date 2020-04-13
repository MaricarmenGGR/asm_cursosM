@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card card-cursos">
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
                    <a href="{{ route('userviewcurso.index') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#exampleModal">
                                Inscribirme
                            </button>
                        </div>
                    </div>


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
            <div class="card card-cursos">
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
                    <a href="{{ route('userviewcurso.index') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#exampleModal">
                                Inscribirme
                            </button>
                        </div>
                    </div>


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
            <div class="card card-cursos">
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
                    <a href="{{ route('userviewcurso.index') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#exampleModal">
                                Inscribirme
                            </button>
                        </div>
                    </div>


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
            <div class="card card-cursos">
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
                    <a href="{{ route('userviewcurso.index') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
                    <br>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#exampleModal">
                                Inscribirme
                            </button>
                        </div>
                    </div>


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