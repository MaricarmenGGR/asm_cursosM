@extends('layouts.menu')
@section('content')

<!-- VISTA COMO ADMINISTRADOR -->
@if( Auth::user()->role->id == 1 )
    <div class="container-fluid">
        <div class="row">
            @foreach($cursos as $curso)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card card-cursos">
                        <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h4 class="card-title">{!! $curso->nombreCurso !!}</h4>
                                </div>
                                <div class="col-2">
                                    <a href="{{ route('cursos.show',$curso->id) }}"><i class="fas fa-cog "></i></a>
                                </div>
                            </div>
                            <hr>
                            <p class="card-text">
                                {!! $curso->descripcionCurso !!}
                            </p>
                                
                            <a href="{{ route('cursos.show',$curso->id) }}" class="black-text d-flex justify-content-end">
                                <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        <!--
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card card-cursos">
                    <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">Nombre Curso </h4>
                            </div>
                            <div class="col-2">
                                <a href="{{ route('verCurso') }}"><i class="fas fa-cog "></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="card-text">
                            Descripción
                        </p>

                        <a href="{{ route('cursos') }}" class="black-text d-flex justify-content-end">
                            <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                        </a>
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
                                <a href="{{ route('verCurso') }}"><i class="fas fa-cog "></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="card-text">
                            Descripción
                        </p>

                        <a href="{{ route('cursos') }}" class="black-text d-flex justify-content-end">
                            <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                        </a>
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
                                <a href="{{ route('verCurso') }}"><i class="fas fa-cog "></i></a>
                            </div>
                        </div>
                        <hr>
                        <p class="card-text">
                            Descripción
                        </p>
                            
                        <a href="{{ route('cursos') }}" class="black-text d-flex justify-content-end">
                            <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                        </a>
                    </div>
                </div>
            </div>
        --> 
        </div>
        
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-outline-light"><a href={{ route("crearCurso") }} class="black-text d-flex justify-content-end">
                <h5>Crear un nuevo curso</h5></a>
            </button>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
            <button class="btn btn-outline-light"><a href={{ route("homeUser.index") }} class="black-text d-flex justify-content-end">
                <h5>Vista de Usuario</h5></a>
            </button>
        </div>
    </div>
@endif

<!-- VISTA COMO USUARIO -->
@if( Auth::user()->role->id == 2 )
    <div class="container-fluid">
        <div class="row">
        @foreach($cursos as $curso)
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="card card-cursos">
                    <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-10">
                                <h4 class="card-title">{!! $curso->nombreCurso !!}</h4>
                            </div>
                            <div class="col-2">
                                <!--<a><i class="fas fa-cog"></i></a>-->
                            </div>
                        </div>
                        <hr>
                        <p class="card-text">
                            {!! $curso->descripcionCurso !!}
                        </p> 
                        <a href="{{ route('userviewcurso.index') }}" class="black-text d-flex justify-content-end">
                            <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                        </a>
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#modalInscripcion{{$curso->id}}">
                                    Inscribirme
                                </button>
                            </div>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="modalInscripcion{{$curso->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inscripción</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                ¿Desea inscribirse al curso {{$curso->nombreCurso}}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                    <!--<a href={{action('CursosController@inscribirse',$curso->id)}} class="btn btn-success">SÍ</a>-->
                                    <form method="post" action="/inscribirse">
                                        @csrf
                                        <input type="number" name="idCurso" value="{{$curso->id}}" hidden>
                                        <button type="submit" class="btn btn-success">SÍ</button>
                                    </form>
                                    
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endif

@endsection