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
                            <a class="nav-item nav-link active" id="info-tab" href="/cursos/{{$curso->id}}">Información General</a>
                            <a class="nav-item nav-link" id="programa-tab" href="/{{$curso->id}}/programa">Programa</a>
                            <a class="nav-item nav-link" id="materiales-tab" href="/{{$curso->id}}/material">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" href="/{{$curso->id}}/evaluacion">Evaluación</a>
                            <a class="nav-item nav-link" id="asistencia-tab" href="/{{$curso->id}}/asistencia" >Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" href="/{{$curso->id}}/invitacion">Invitación</a>
                            <a class="nav-item nav-link" id="resultadosEva-tab" href="/{{$curso->id}}/resultados">Resultados</a>


                            {{--<a onclick="viewInfoCurso(@php echo $curso->id @endphp)" class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                            <a onclick="eliminarTabla();verTabla(@php echo $curso->id @endphp)" class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa</a>
                            <a onclick="eliminarTablaMaterial();verMateriales(@php echo $curso->id @endphp)"class="nav-item nav-link" id="materiales-tab"   data-toggle="tab" href="#materiales"   role="tab" aria-controls="materiales" aria-selected="false">Material</a>
                            <a onclick="comprobarFechas(@php echo $curso->id @endphp);" class="nav-item nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación</a>
                            <a class="nav-item nav-link" id="invitacion-tab" data-toggle="tab" href="#invitacion" role="tab" aria-controls="invitacion" aria-selected="false">Invitación</a>
                            <a class="nav-item nav-link" id="resultadosEva-tab" data-toggle="tab" href="#resultadosEva" role="tab" aria-controls="resultadosEva" aria-selected="false">Resultados</a>
                            --}}
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                <!--INFO CURSO-->    
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab"><h2>Información del Curso</h2>
                        <br>
                        <div id="accordion" style="margin-right: 10%; margin-left: 10%;">
                            <div class="card">
                                <div class="card-header card-header_curso" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-accordion" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Información general curso
                                    </button>
                                    <a class="btn" onclick="editInfo()"><i class="fas fa-pencil-alt"></i></a>
                                </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p id="pInfo">{!! $curso->descripcionCurso !!}<p>
                                    <form id="infoForm">
                                        {{ csrf_field() }}
                                        <div class="form-row">
                                            <textarea class="form-control" id="descripcionCurso" name="descripcionCurso" cols="50" hidden style="margin-bottom: 15px;">{!! $curso->descripcionCurso !!}</textarea>
                                        </div>

                                        <div class="form-inline">
                                            <label> Modalidad: &nbsp; </label>
                                            <label id="pModalidad">{!! $curso->modalidad !!}</label>
                                            <select class="custom-select" name="modalidad_id" id="modalidad" style="margin-bottom: 5px;" hidden>
                                                @foreach($modalidades as $modalidad)
                                                    @if( $modalidad->id == $curso->modalidad_id )
                                                        <option value="{!! $modalidad->id !!}" selected>{!! $modalidad->nombre !!}</option>
                                                    @else
                                                        <option value="{!! $modalidad->id !!}">{!! $modalidad->nombre !!}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-inline">
                                            <label> Lugar:&nbsp;</label>
                                            <label id="pLugar">{!! $curso->lugar !!}</label>
                                            <input hidden type="text" class="form-control" id="lugar" name="lugar" value="{!! $curso->lugar !!}" style="margin-bottom: 5px;">
                                        </div>

                                        <div class="form-inline">
                                            <label>Del:&nbsp;</label>
                                            <label id="pFechaInicio">{!! $curso->fechaInicio !!}</label>
                                            <input hidden type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{!! $curso->fechaInicio !!}" style="margin-bottom: 5px;">
                                            <label>&nbsp;al:&nbsp;</label>
                                            <label id="pFechaFin">{!! $curso->fechaFin !!}</label>
                                            <input hidden type="date" class="form-control" id="fechaFin" name="fechaFin" value="{!! $curso->fechaFin !!}" style="margin-bottom: 5px;">
                                        </div>

                                        <a class="btn btn-secondary float-right" id="cancelInfo" onclick="cancelInfo()" hidden style="margin-top: 10px; margin-bottom: 10px; margin-left: 5px; color: white;">Cancelar</a>
                                        <button type="submit" class="btn btn-asm float-right" id="updateInfo" hidden style="margin-top: 10px; margin-bottom: 10px;">Guardar</button>

                                    </form>
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header card-header_curso" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-accordion collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Información del ponente
                                    </button>
                                    <a class="btn" onclick="editPonente()"><i class="fas fa-pencil-alt"></i></a>
                                </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                        <form id="ponenteForm" class="form-group">
                                            {{ csrf_field() }}
                                            <h4><label id="pNomP">{!! $curso->nombrePonente !!}</label></h4>
                                            <label id="pInfP">{!! $curso->infoPonente !!}</label>
                                        
                                            
                                            <label id="LnombrePonente" hidden>Nombre Completo del Ponente</label>
                                            <input type="text" class="form-control" name="nombrePonente" id="nombrePonente" value="{!! $curso->nombrePonente !!}" placeholder="Nombre completo del ponente" hidden style="margin-bottom: 5px;">
                                            <label id="LinfoPonente" hidden>Información del Ponente</label>
                                            <textarea class="form-control" id="infoPonente" name="infoPonente" cols="50" placeholder="Información del ponente" hidden>{{$curso->infoPonente}}</textarea>
                                            <a class="btn btn-secondary float-right" id="cancelP" onclick="cancelPonente()" hidden style="margin-top: 10px; margin-bottom: 10px; margin-left: 5px; color: white;">Cancelar</a>
                                            <button type="submit" class="btn btn-asm float-right" id="updateP" hidden style="margin-top: 10px; margin-bottom: 10px;">Guardar</button>
                                        </form>
                                </div>
                                </div>

                            </div>
                            <div class="card">
                                <div class="card-header card-header_curso" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-accordion collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Horario
                                    </button>
                                    <a class="btn" onclick="editHorario()"><i class="fas fa-pencil-alt"></i></a>
                                </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    <form id="horarioForm" class="form-group ">
                                        {{ csrf_field() }}
                                        <div class="form-inline">
                                            <label>Horario actual:&nbsp;</label>
                                            <input hidden class="form-control" id="horaInicio" name="horaInicio" type="time" value="{{ $curso->horaInicio}}">
                                            <label id="pHoraInicio">{{ $curso->horaInicio}}</label>
                                            <label>&nbsp;-&nbsp;</label>
                                            <input hidden class="form-control" id="horaFin" name="horaFin" type="time" value="{{ $curso->horaFin}}">
                                            <label id="pHoraFin">{{ $curso->horaFin}}</label>
                                        </div>


                                        <div class="form-inline">

                                        <label>Horas Totales:&nbsp;</label>
                                        <label id="pHorasTotales">{{ $curso->horasTotales}}</label>
                                        <input hidden class="form-control" id="horasTotales" name="horasTotales" type="number" value="{{ $curso->horasTotales}}">
                                        <a class="btn btn-secondary" id="cancelH" onclick="cancelHorario()" hidden style="margin-top: 10px; margin-bottom: 10px; margin-left: 15px; margin-right: 5px; color: white;">Cancelar</a>
                                        <button type="submit" class="btn btn-asm" id="updateH" hidden style="margin-top: 10px; margin-bottom: 10px;">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            <!--
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        Fechas Programadas
                                    </button>
                                </h5>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                <div class="card-body">
                                        <form class="form-group" method="POST" action="/cursos/{{$curso->id}}">
                                        @method('PUT')
                                        @csrf
                                        <label>Fecha de Inicio</label>
                                        <input class="form-control" name="fechaInicio" cols="50" id="entradaPonente" type="date" value = "{!! $curso->fechaInicio !!}">
                                        <label>Fecha de Termino</label>
                                        <input class="form-control" name="fechaFin" cols="50" type="date" value = "{!! $curso->fechaFin !!}">
                                        <br>
                                        <button type="submit" class="btn btn-asm float-right" id="editInfoFechas">Actualizar</button>

                                        <br>
                                        </form>
                                </div>
                                </div>
                            </div>
                            -->
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
                console.log(data);
                document.getElementById("pNombre").innerHTML=data.nombreCurso
                $("#nombreCurso").val(data.nombreCurso);

                document.getElementById("pInfo").innerHTML=data.descripcionCurso
                document.getElementById("pModalidad").innerHTML=data.modalidad
                document.getElementById("pLugar").innerHTML=data.lugar
                document.getElementById("pFechaInicio").innerHTML=data.fechaInicio
                document.getElementById("pFechaFin").innerHTML=data.fechaFin
                $("#descripcionCurso").val(data.descripcionCurso);
                $("#lugar").val(data.lugar);
                $("#fechaInicio").val(data.fechaInicio);
                $("#fechaFin").val(data.fechaFin);

                document.getElementById("pNomP").innerHTML=data.nombrePonente
                document.getElementById("pInfP").innerHTML=data.infoPonente
                $("#nombrePonente").val(data.nombrePonente);
                $("#infoPonente").val(data.infoPonente);

                document.getElementById("pHoraInicio").innerHTML=data.horaInicio
                document.getElementById("pHoraFin").innerHTML=data.horaFin
                document.getElementById("pHorasTotales").innerHTML=data.horasTotales
                $("#horaInicio").val(data.horaInicio);
                $("#horaFin").val(data.horaFin);
                $("#horasTotales").val(data.horasTotales);

                //Para los minimos y maximos de fecha de activacion de examen
                document.getElementById("fechaActivar").removeAttribute("min");
                $("#fechaActivar").attr({"min" : data.fechaInicio});
                //Para los minimos y maximos de fecha de activacion de examen
                document.getElementById("fechaDesactivar").removeAttribute("min");
                $("#fechaDesactivar").attr({"min" : data.fechaFin});
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

    // EDITAR INFORMACION DEL CURSO
    function editInfo(){
        document.getElementById("updateInfo").removeAttribute("hidden");
        document.getElementById("cancelInfo").removeAttribute("hidden");

        document.getElementById("pInfo").setAttribute("hidden", true);
        document.getElementById("pModalidad").setAttribute("hidden", true);
        document.getElementById("pLugar").setAttribute("hidden", true);
        document.getElementById("pFechaInicio").setAttribute("hidden", true);
        document.getElementById("pFechaFin").setAttribute("hidden", true);

        document.getElementById("descripcionCurso").removeAttribute("hidden");
        document.getElementById("modalidad").removeAttribute("hidden");
        document.getElementById("lugar").removeAttribute("hidden");
        document.getElementById("fechaInicio").removeAttribute("hidden");
        document.getElementById("fechaFin").removeAttribute("hidden");
    }
    function cancelInfo(){
        document.getElementById("updateInfo").setAttribute("hidden", true);
        document.getElementById("cancelInfo").setAttribute("hidden", true);

        document.getElementById("pInfo").removeAttribute("hidden");
        document.getElementById("pModalidad").removeAttribute("hidden");
        document.getElementById("pLugar").removeAttribute("hidden");
        document.getElementById("pFechaInicio").removeAttribute("hidden");
        document.getElementById("pFechaFin").removeAttribute("hidden");

        document.getElementById("descripcionCurso").setAttribute("hidden", true);
        document.getElementById("modalidad").setAttribute("hidden", true);
        document.getElementById("lugar").setAttribute("hidden", true);
        document.getElementById("fechaInicio").setAttribute("hidden", true);
        document.getElementById("fechaFin").setAttribute("hidden", true);
    }
    $('#infoForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#infoForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelInfo();
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

    // EDITAR INFORMACION DEL PONENTE
    function editPonente(){
        document.getElementById("updateP").removeAttribute("hidden");
        document.getElementById("cancelP").removeAttribute("hidden");
        document.getElementById("pNomP").setAttribute("hidden", true);
        document.getElementById("pInfP").setAttribute("hidden", true);
        document.getElementById("LnombrePonente").removeAttribute("hidden");
        document.getElementById("LinfoPonente").removeAttribute("hidden");
        document.getElementById("nombrePonente").removeAttribute("hidden");
        document.getElementById("infoPonente").removeAttribute("hidden");
    }
    function cancelPonente(){
        document.getElementById("updateP").setAttribute("hidden", true);
        document.getElementById("cancelP").setAttribute("hidden", true);
        document.getElementById("pNomP").removeAttribute("hidden");
        document.getElementById("pInfP").removeAttribute("hidden");
        document.getElementById("LnombrePonente").setAttribute("hidden", true);
        document.getElementById("LinfoPonente").setAttribute("hidden", true);
        document.getElementById("nombrePonente").setAttribute("hidden", true);
        document.getElementById("infoPonente").setAttribute("hidden", true);
    }
    $('#ponenteForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#ponenteForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelPonente()
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

    // EDITAR HORARIO
    function editHorario(){
        document.getElementById("updateH").removeAttribute("hidden");
        document.getElementById("cancelH").removeAttribute("hidden");
        document.getElementById("pHoraInicio").setAttribute("hidden", true);
        document.getElementById("pHoraFin").setAttribute("hidden", true);
        document.getElementById("pHorasTotales").setAttribute("hidden", true);
        document.getElementById("horaInicio").removeAttribute("hidden");
        document.getElementById("horaFin").removeAttribute("hidden");
        document.getElementById("horasTotales").removeAttribute("hidden");
    }
    function cancelHorario(){
        document.getElementById("updateH").setAttribute("hidden", true);
        document.getElementById("cancelH").setAttribute("hidden", true);
        document.getElementById("pHoraInicio").removeAttribute("hidden");
        document.getElementById("pHoraFin").removeAttribute("hidden");
        document.getElementById("pHorasTotales").removeAttribute("hidden");
        document.getElementById("horaInicio").setAttribute("hidden", true);
        document.getElementById("horaFin").setAttribute("hidden", true);
        document.getElementById("horasTotales").setAttribute("hidden", true);
    }
    $('#horarioForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#horarioForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelHorario()
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
        var curso_id = btn.value;
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
