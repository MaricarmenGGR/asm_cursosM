@extends('layouts.menu')
@section('content')

<!-- VISTA COMO ADMINISTRADOR -->
@if( Auth::user()->role->id == 1 )
    <div class="container-fluid">
        <div class="cartas-curso"> 
            @foreach($cursos as $curso)
            
                <div class="carta-cursos">
                    <div class="carta-curso_top">
                        <img class="carta-curso_imagen" src="../uploads/{{$curso->imagenCurso}}">
                    </div>
                    <div class="carta-curso_contenido">
                        <div class="carta-curso_fecha justify-content-end">
                                <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;
                                <time>{!! $curso->fechaInicio !!}</time>
                        </div>
                        <h4 class="card-title">{!! $curso->nombreCurso !!}</h4>
                        <hr>
                        <p style="font-size: 12px;text-align: justify;">
                            {!! $curso->descripcionCurso !!}
                        </p>
                    </div>
                    <a href="/cursos/{{$curso->id}}" class="black-text d-flex justify-content-start" style="text-decoration: inherit;">
                        <h5>Editar&nbsp;<i class="fas fa-wrench"></i></h5>
                    </a>
                    <br>
                </div>
            @endforeach
                <div class="carta-cursos">
                    <a href={{ route("crearCurso") }} style="text-decoration:none; color: rgb(40, 146, 157);" >
                    <div class="carta-curso_top">
                        <img class="carta-curso_imagen" src="../img/nuevo_curso.png">
                    </div>
                    <div class="carta-curso_contenido">
                        Nuevo Curso
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
            @if($curso->verificarArea($curso->id, Auth::user()->area_id ))
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card card-cursos">
                        <img class="card-img-top" src="../uploads/{{$curso->imagenCurso}}" height="200" alt="Card image cap">
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
                                    @if( ! Auth::user()->estaInscrito($curso->id) && $curso->hayCupo($curso->id, Auth::user()->area_id) )
                                    <button type="button" class="btn btn-block btn-asm" onclick="inscripcion({{$curso->id}})">
                                        Inscribirme
                                    </button>
                                    @elseif( Auth::user()->estaInscrito($curso->id) )
                                    <a href="{{ route('cursosUsuario.show',$curso->id) }}" class="btn btn-block btn-asm">
                                        Entrar al curso
                                    </a>
                                    @elseif( ! $curso->hayCupo($curso->id, Auth::user()->area_id) )
                                    <button disabled type="button" class="btn btn-block btn-asm">
                                        Cupo lleno
                                    </button>
                                    @endif
                                </div>
                            </div>

                            <form id="frmInscribirse_{{$curso->id}}" method="post" action="/inscribirse">
                                @csrf
                                <input type="number" name="idCurso" value="{{$curso->id}}" hidden>
                            </form>
                            <input type="text" id="nombreCurso_{{$curso->id}}" value="{{$curso->nombreCurso}}" hidden>


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
    <script>
        function inscripcion(id_curso){
            Swal.fire({
                title: '¿Desea inscribirse a '+$("#nombreCurso_"+id_curso).val()+"?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'No',
                confirmButtonText: 'Sí'
                }).then((result) => {
                if (result.value) { 
                    $("#frmInscribirse_"+id_curso).submit();
                }
            })
        }
    </script>
@endif

@endsection