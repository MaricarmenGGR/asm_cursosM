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
                            <a class="nav-item nav-link" id="materiales-tab" href="/{{$curso->id}}/material">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" href="/{{$curso->id}}/evaluacion">Evaluación</a>
                            <a class="nav-item nav-link active" id="asistencia-tab" href="/{{$curso->id}}/asistencia" >Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" href="/{{$curso->id}}/invitacion">Invitación</a>
                            <a class="nav-item nav-link" id="resultadosEva-tab" href="/{{$curso->id}}/resultados">Resultados</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">

                <!--ASISTENCIA-->
                    <div class="tab-pane fade show active" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                        
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center text-uppercase py-3">Lista de personas inscritas</h4>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="tableAsistencia" class="table mx-auto col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">CURP</th>
                                                        <th scope="col">Área</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodyTableAsistencia">
                                                        
                                                        @php $c=0; @endphp
                                                        @foreach($inscritos as $inscrito)
                                                        @php $c=$c+1; @endphp 
                                                        <tr>
                                                            <th scope="row">{{ $c }}</th>
                                                            <td>{{ $inscrito->name  }} {{ $inscrito->apPaterno }} {{ $inscrito->apMaterno }} </td>
                                                            <td>{{ $inscrito->curp }}</td>
                                                            <td>{{ $inscrito->nombre }}</td>
                                                        </tr>
                                                        @endforeach
                                                            
                                                        
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                </div>                                 
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center text-uppercase py-3">Lista de asistencia</h4>
                                        <div class="card-body">
                                        
                                            <div class="table-responsive">
                                                <table id="tableAsistencia" class="table mx-auto col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                        <th scope="col">Nombre</th>
                                                        <th scope="col">Fecha</th>
                                                        <th scope="col">Hora de Entrada</th>
                                                        <th scope="col">Hora de Salida</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bodyTableAsistencia">
                                                        
                                                        

                                                            <tr>
                                                                
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                

                                                        </tr>
                                                            
                                                        
                                                    </tbody>
                                                </table>
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
    $("#tableAsistencia").DataTable( {
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
    
});
</script>

@endsection
