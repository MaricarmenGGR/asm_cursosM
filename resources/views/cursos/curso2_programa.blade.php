@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <div class="text-center">
                    <h1>
                        <p class="d-inline" id="pNombre" style="font-size: 27px;">{!! $curso->nombreCurso !!} </p>
                        <a class="btn d-inline" id="editNombre" onclick="editNombre()"><i class="fas fa-pencil-alt"></a></i>
                    </h1>

                <div class="row">
                    <div class="col-lg-4"></div>
                    <form id="nombreForm" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" value="{{$curso->nombreCurso}}" placeholder="Nombre del curso" hidden>
                        </div>
                        <button id="updateNombre" type="submit" class="btn btn-asm mb-2" hidden>Guardar</button>
                        <a id="cancelNombre" class="btn btn-secondary mb-2" style="margin-left: 5px; color: white;" hidden onclick="cancelNombre()">Cancelar</a>
                    </form>
                </div>

                <input id="idCurso" type="number" hidden value="{{ $curso->id }}">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs" style="margin-top: 1%;">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link" id="info-tab" href="/cursos/{{$curso->id}}">Información General</a>
                            <a class="nav-item nav-link active" id="programa-tab" href="/{{$curso->id}}/programa">Programa</a>
                            <a class="nav-item nav-link" id="materiales-tab" href="/{{$curso->id}}/material">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" href="/{{$curso->id}}/evaluacion">Evaluación</a>
                            <a class="nav-item nav-link" id="asistencia-tab" href="/{{$curso->id}}/asistencia" >Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" href="/{{$curso->id}}/invitacion">Invitación</a>
                            <a class="nav-item nav-link" id="resultadosEva-tab" href="/{{$curso->id}}/resultados">Resultados</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                <!--PROGRAMA/ACTIVIDADES-->
                    <div class="tab-pane fade show active" id="programa" role="tabpanel" aria-labelledby="programa-tab">
                        <!--<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">-->
                        <div class="row">
                            <!-- Editable table -->
                            <div class="col-lg-8">
                                <div class="card">
                                    <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-4">Listado de Actividades</h4>
                                    <div class="card-body">
                                        
                                        <!--<span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                                                class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>-->
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered text-center" style="width:100%">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">Actividad</th>
                                                    <th class="text-center">Hora</th>
                                                    <th class="text-center">Fecha</th>
                                                    <th class="text-center">Borrar</th>
                                                </tr>
                                                </thead>
                                                <tbody id="actividadesPrograma">
                                                
                                                </tbody>
                                            
                                            </table>
                                        </div>

                                        
                                    </div>
                                </div>
                            </div>

                            <!-- Editable table -->
                            <div class="col-lg-4">
                                <div class="card">
                                    <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-4">Nueva actividad</h4>
                                    <div class="card-body">

                                        <form id="actividadNewForm" class="form-group">
                                            {{ csrf_field() }}
                                            
                                                <div class="form-group" style="padding: 0 2% 0 2%">
                                                    <div class="text-left">
                                                        <label>Descripción de la actividad</label>
                                                    </div>
                                                    <textarea type="text" class="form-control" id="actividad" name="actividad" placeholder="Actividad" required></textarea>
                                                </div>
                                                <div class="form-group" style="padding: 0 2% 0 2%">
                                                    <div class="text-left">
                                                        <label>Hora</label>
                                                    </div>
                                                    <input type="time" class="form-control" id="hora" name="hora" placeholder="Hora" required>
                                                </div>
                                                <div class="form-group" style="padding: 0 2% 0 2%">
                                                    <div class="text-left">
                                                        <label>Fecha</label>
                                                    </div>
                                                    <input type="date" class="form-control" id="fechaActividad" name="fechaActividad" placeholder="fechaActividad" required>
                                                </div>
                                            
                                            <input type="hidden" value="{{$curso->id}}" id="curso_id" name="curso_id">
                                            <div class="form-group">
                                                <button class="btn btn-asm float-right" id="subirActividadDelCurso">Añadir</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modificar Info del Curso-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function viewInfoCurso(id){
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/getCInfo/"+id,
            success: function(data){
                document.getElementById("pNombre").innerHTML=data.nombreCurso
                $("#nombreCurso").val(data.nombreCurso);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            }
        });
    }
    //EDITAR NOMBRE DEL CURSO
    function editNombre(){
        document.getElementById("updateNombre").removeAttribute("hidden");
        document.getElementById("cancelNombre").removeAttribute("hidden");
        document.getElementById("nombreCurso").removeAttribute("hidden");
        document.getElementById("pNombre").classList.remove('d-inline');
        document.getElementById("pNombre").classList.add('d-none');
        document.getElementById("editNombre").classList.remove('btn');
        document.getElementById("editNombre").classList.remove('d-inline');
        document.getElementById("editNombre").classList.add('d-none');

    }
    function cancelNombre(){
        document.getElementById("updateNombre").setAttribute("hidden", true);
        document.getElementById("cancelNombre").setAttribute("hidden", true);
        document.getElementById("nombreCurso").setAttribute("hidden", true);
        document.getElementById("pNombre").classList.remove('d-none');
        document.getElementById("pNombre").classList.add('d-inline');
        document.getElementById("editNombre").classList.remove('d-none');
        document.getElementById("editNombre").classList.add('btn');
        document.getElementById("editNombre").classList.add('d-inline');

    }
    $('#nombreForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#nombreForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelNombre();
                viewInfoCurso(id);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown){
                Swal.fire({
                    icon: 'error',
                    title: 'Ha ocurrido un error',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    });
</script>

<script>
$( document ).ready(function() {
    var curso_id = $('#curso_id').val();
    eliminarTabla()
    verTabla(curso_id)
});
</script>

<!--Agregar y leer de Actividades de Programa con AJAX-->
<script>
    $("#subirActividadDelCurso").click(function (e) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        var actividad = $('#actividad').val();
        var hora = $('#hora').val();
        var fechaActividad = $('#fechaActividad').val();
        var token = '{{csrf_token()}}';
        var data={_token:token,curso_id:curso_id,actividad:actividad,hora:hora,fechaActividad:fechaActividad};
        $.ajax({
        type: "post",
        url: "{{ route('programas.store') }}",
        data: data,
        success: function(response){
            Swal.fire({
                icon: 'success',
                title: 'Se agrego una Actividad Nueva',
                showConfirmButton: false,
                timer: 1500
            });
            eliminarTabla()
            verTabla(curso_id)
        },
        error: function(XMLHttpRequest, textStatus, errorThrown){
            Swal.fire({
                icon: 'error',
                title: 'Ha ocurrido un error',
                showConfirmButton: false,
                timer: 2000
                });
            }
        });
    });
    
    function verTabla(id){
        $.ajax({
            url:'/listar/'+id,
            type:'get',
        }).done(function(res){
            var tablaDatos = $("#actividadesPrograma");
            $(res).each(function(key,value){
            tablaDatos.append(
            '<tr class="hide">'+
            '<td class="pt-3-half">'+value.curso_id+'</td>'+
            '<td class="pt-3-half">'+value.actividad+'</td>'+
            '<td class="pt-3-half">'+value.hora+'</td>'+
            '<td class="pt-3-half">'+value.fechaActividad+'</td>'+
            '<td>'+
            '<span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light" value="'+value.id+'" onClick="EliminarAct(this);">Borrar</button></span>'+
            '</td>'+
            '</tr>');
            });
        });
    }
    //Borrar Actividades
    function EliminarAct(btn){
        var actividad = $('#actividad').val();
        var ruta = "/borrarAct/"+btn.value;
        var token = '{{csrf_token()}}';
        var curso_id = btn.value;
        $.ajax({
            url:ruta,
            headers:{'X-CSRF-TOKEN':token},
            type:'delete',
            dataType : 'json',
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Actividad Eliminada',
                    showConfirmButton: false,
                    timer: 1500
                });
                eliminarTabla()
                verTabla(curso_id);
            }
        });
    }
    function eliminarTabla(){
        var tablaDatos = $("#actividadesPrograma");
        tablaDatos.empty();
    }
</script>


@endsection
