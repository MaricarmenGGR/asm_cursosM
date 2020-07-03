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
                            <a class="nav-item nav-link" id="programa-tab" href="/{{$curso->id}}/programa">Programa</a>
                            <a class="nav-item nav-link active" id="materiales-tab" href="/{{$curso->id}}/material">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" href="/{{$curso->id}}/evaluacion">Evaluación</a>
                            <a class="nav-item nav-link" id="asistencia-tab" href="/{{$curso->id}}/asistencia" >Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" href="/{{$curso->id}}/invitacion">Invitación</a>
                            <a class="nav-item nav-link" id="resultadosEva-tab" href="/{{$curso->id}}/resultados">Resultados</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">


                <!--MATERIALES-->
                    <div class="tab-pane fade show active" id="materiales" role="tabpanel" aria-labelledby="materiales-tab">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Materiales del Curso</h4>
                                    <div class="card-body">
                                        <div id="table" class="table-editable">
                                            <table class="table table-bordered table-responsive-md table-striped text-center" id="materialesCurso">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">Curso</th>
                                                    <th class="text-center">Material</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                </tbody>
                                            
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-lg-4">
                                <div class="card">
                                    <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Subir Material</h4>
                                    <div class="card-body">
                                        <form id="materialNewForm" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="file-field">
                                                
                                                <span>Selecciona los archivos</span>
                                                <input type="file" class="form-control" id="url" multiple name="url[]">
                                                <input type="hidden" value="{{$curso->id}}" id="curso_id" name="curso_id">
                                                
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-asm float-right" id="subeMaterial">Subir</button>
                                            <br>
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
    eliminarTablaMaterial();
    verMateriales(curso_id);
});
</script>

<!--Crud Materiales con AJAX-->
<script>
    $('#materialNewForm').submit( function( e ) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        $.ajax({
            url: '{{ route("materiales.store") }}',
            type: 'POST',
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se agregon los materiales',
                    showConfirmButton: false,
                    timer: 1500
                });
                eliminarTablaMaterial();
                verMateriales(curso_id);
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
    function verMateriales(id){
        $.ajax({
            url:'/verMateriales/'+id,
            type:'get',
        }).done(function(res){
            console.log(res)
            var tablaDatos = $("#materialesCurso");
            $(res).each(function(key,value){
                tablaDatos.append(
                '<tr class="hide">'+
                '<td class="pt-3-half">'+value.curso_id+'</td>'+
                '<td class="pt-3-half">'+value.url+'</td>'+
                '<td>'+
                '<span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light" value="'+value.id+'" onClick="EliminarMaterial(this);">Borrar</button></span>'+
                '</td>'+
                '</tr>')
            });
        });
    }
    function EliminarMaterial(btn){
        var ruta = "/borrarMaterial/"+btn.value;
        var token = '{{csrf_token()}}';
        var curso_id = $('#curso_id').val();
        $.ajax({
            url:ruta,
            headers:{'X-CSRF-TOKEN':token},
            type:'delete',
            dataType : 'json',
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Archivo Eliminado',
                    showConfirmButton: false,
                    timer: 1500
                });
                eliminarTablaMaterial();
                verMateriales(curso_id);
            }
        });
    }
    function eliminarTablaMaterial(){
        var tablaDatos = $("#materialesCurso");
        tablaDatos.empty();
    }
</script>


@endsection