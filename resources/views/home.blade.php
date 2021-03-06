@extends('layouts.menu')
@section('content')

<!-- VISTA COMO ADMINISTRADOR -->
@if( Auth::user()->role->id == 1 )
    <div class="container-fluid">
        <!--<div class="cartas-curso"> --><div class="row">

            @foreach($cursos as $curso)
                @if( $curso->status_id != 3 )
                    <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                        <div class="card">
                            
                            <img class="card-img-top" src="../uploads/{{$curso->imagenCurso}}">
                            
                            <div class="card-block">
                                <h4 class="card-title" style="text-align: center;">{!! $curso->nombreCurso !!}</h4>

                                <div class="meta d-flex" >
                                        <div class="mr-auto p-2" style="color: gray;">
                                            <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;{!! $curso->fechaInicio !!}
                                        </div>
                                        
                                        <input type="hidden" id="curso_id" value="{{$curso->id}}">

                                    

                                        <div class="p-2">
                                            <a href="/pdfCurso/{{$curso->id}}" style="color: black;"><i class="fas fa-file-pdf"></i></a>
                                        </div>

                                        <div class="p-2">
                                        <button onclick="borrarCurso();" style="padding: 0;border: none; background: none;color: red;"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                        
                                </div>


                                <div class="card-text" style="text-align: justify; color: black;">
                                    {!! $curso->descripcionCurso !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-asm btn-block" href="/cursos/{{$curso->id}}" >
                                    Editar
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

                <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="card">
                        <div class="card-block">
                            <div class="card-text">
                                <a href="/crearCurso"><img class="carta-curso_imagen" src="../img/nuevo_curso.png" role="button">
                                <p style="font-size: 20px;text-align: center; color: rgb(40, 146, 157);">Nuevo Curso</p></a>
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!--Borrar Curso-->
    <script>
        function borrarCurso(){
            var curso_id = $('#curso_id').val();
            var ruta = "/borrarCurso/"+curso_id;
        var token = '{{csrf_token()}}';
        $.ajax({
            url:ruta,
            headers:{'X-CSRF-TOKEN':token},
            type:'delete',
            dataType : 'json',
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'CURSO ELIMINADO',
                    showConfirmButton: false,
                    timer: 1500
                });
                location.reload();
            }
        });
        }
    </script>
@endif

<!-- VISTA COMO USUARIO -->
@if( Auth::user()->role->id != 1 )
    <div class="container-fluid">
        <div class="row">
        @foreach($cursos as $curso)
            @if($curso->verificarArea($curso->id, Auth::user()->area_id ) && $curso->status_id == 2 )
                <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                    <div class="card">
                        <img class="card-img-top" style="width:100%;" src="../uploads/{{$curso->imagenCurso}}">
                        <div class="card-block">
                            <h4 class="card-title" style="text-align: center;">{!! $curso->nombreCurso !!}</h4>
                            <div class="meta" style="text-align: left; color: gray;">
                                <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;{!! $curso->fechaInicio !!}
                            </div>
                            <div class="card-text" style="text-align: justify; color: black;">
                                {!! $curso->descripcionCurso !!}
                            </div>
                            @if( ! Auth::user()->estaInscrito($curso->id) )
                            <a href="{{ route('cursosUsuario.show',$curso->id) }}" class="black-text d-flex justify-content-end">
                                <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                            </a>
                            @endif
                        </div>
                        <div class="card-footer">
                            @if( ! Auth::user()->estaInscrito($curso->id) && $curso->hayCupo($curso->id, Auth::user()->area_id) )
                            <button type="button" class="btn btn-asm btn-block" onclick="inscripcion({{$curso->id}})">
                                Inscribirme
                            </button>
                            @elseif( Auth::user()->estaInscrito($curso->id) )
                            <a href="{{ route('cursosUsuario.show',$curso->id) }}" class="btn btn-asm btn-block">
                                Entrar al curso
                            </a>
                            @elseif( ! $curso->hayCupo($curso->id, Auth::user()->area_id) )
                            <button disabled type="button" class="btn btn-asm btn-block">
                                Cupo lleno
                            </button>
                            @endif
                        </div>
                    </div>
                </div>
                    <form id="frmInscribirse_{{$curso->id}}" method="post" action="/inscribirse">
                        @csrf
                        <input type="number" name="idCurso" value="{{$curso->id}}" hidden>
                    </form>
                    <input type="text" id="nombreCurso_{{$curso->id}}" value="{{$curso->nombreCurso}}" hidden>
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