@extends('layouts.menu')
@section('content')

<!-- VISTA COMO ADMINISTRADOR -->
@if( Auth::user()->role->id == 1 )
    <div class="container-fluid">
        <div class="row">
            @foreach($cursos as $curso)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card h-60 card-cursos">
                        <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h4 class="card-title">{!! $curso->nombreCurso !!}</h4>
                                </div>
                                
                            </div>
                            <hr>
                            <p class="card-text">
                                {!! $curso->descripcionCurso !!}
                            </p>
                                
                            <a href="/cursos/{{$curso->id}}" class="black-text d-flex justify-content-end">
                                <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <a href={{ route("crearCurso") }} style="text-decoration:none; color: rgb(40, 146, 157);" >
                        <div class="card h-60 card-cursos">
                            <div class="card-body"></div>
                            <div class="card-body"></div>
                            <img src="../img/nuevo_curso.png" height="190" alt="Card image cap">
                            <div class="card-body"> <div style="text-align: center;"> <p style="font-size: 140%;">Nuevo Curso</p></div> </div>
                            <div class="card-body"></div>
                        </div>
                    </a>
                </div>
        </div>
    </div>
@endif

<!-- VISTA COMO USUARIO -->
@if( Auth::user()->role->id == 2 )
    <div class="container-fluid">
        <div class="row">
        @foreach($cursos as $curso)
            @if($curso->verificarArea($curso->id, Auth::user()->area_id ) )
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
                            @if( ! Auth::user()->estaInscrito($curso->id) )
                            <a href="{{ route('cursosUsuario.show',$curso->id) }}" class="black-text d-flex justify-content-end">
                                <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                            </a>
                            @else
                                <br>
                            @endif
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    @if( ! Auth::user()->estaInscrito($curso->id) )
                                    <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#modalInscripcion{{$curso->id}}">
                                        Inscribirme
                                    </button>
                                    @else
                                    <a href="{{ route('cursosUsuario.show',$curso->id) }}" class="btn btn-block btn-asm">
                                        Entrar al curso
                                    </a>
                                    @endif
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
            @endif
        @endforeach
        </div>
    </div>
@endif

@endsection