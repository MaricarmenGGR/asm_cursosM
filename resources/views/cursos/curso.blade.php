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
                            <a onclick="viewInfoCurso(@php echo $curso->id @endphp)" class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                            <a onclick="eliminarTabla();verTabla(@php echo $curso->id @endphp)" class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa</a>
                            <a onclick="eliminarTablaMaterial();verMateriales(@php echo $curso->id @endphp)"class="nav-item nav-link" id="materiales-tab"   data-toggle="tab" href="#materiales"   role="tab" aria-controls="materiales" aria-selected="false">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación</a>
                            <a onclick="verAsistentes(@php echo $curso->id @endphp)" class="nav-item nav-link" id="asistencia-tab" data-toggle="tab" href="#asistencia" role="tab" aria-controls="asistencia" aria-selected="false">Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" data-toggle="tab" href="#invitacion" role="tab" aria-controls="invitacion" aria-selected="false">Invitación</a>
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
                                        <h4><p id="pNomP">{!! $curso->nombrePonente !!}<p></h4>
                                        <p id="pInfP">{!! $curso->infoPonente !!}<p>
                                        <form id="ponenteForm" class="form-group">
                                            {{ csrf_field() }}
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
                <!--PROGRAMA/ACTIVIDADES-->
                    <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">
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
                                                    <th class="text-center">Ordenar</th>
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
                <!--MATERIALES-->
                    <div class="tab-pane fade" id="materiales" role="tabpanel" aria-labelledby="materiales-tab">
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
                                                <input type="hidden" value="{{$curso->id}}" name="curso_id">
                                                
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
                <!--EVALUACION-->    
                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Evaluación de conocimientos adquiridos</h4>
                                        <div class="card-body">
                                            <label><strong>Activar examen</strong></label>
                                            <form id="examenActivarForm" class="form-group form-inline">
                                                {{ csrf_field() }}
                                                    
                                                    <div class="form-group form-inline" >
                                                        <label>Fecha Inicio</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaActivarExm" name="fechaActivar" min="{{ $curso->fechaInicio }}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group form-inline">
                                                        <label>Fecha Fin</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaDesactivarExm" name="fechaDesactivar" min="{{ $curso->fechaFin }}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                
                                                <input type="hidden" value="{{$curso->id}}" name="curso_id">
                                                <div class="form-group">
                                                    <button class="btn btn-asm float-right" id="subirActivacionExamen">Guardar</button>
                                                </div>
                                            </form>
                                            <label><strong>Vista previa de examen</strong></label>
                                            <form class="form-horizontal">
                                                <div class="panel-body">
                                                
                                                        <div class="panel-group" id="accordionExamen" role="tablist"
                                                            aria-multiselectable="true">
                                                        </div>
                                                        
                                                        <div class="col-md-12 text-center" style="margin-top:15px;">
                                                            <button class="btn btn-success" id="addButton" value=""><i class="fas fa-plus"></i>&nbsp;Nueva Pregunta</button>
                                                        </div>

                                                    
                                                </div>
                                                <!-- /.panel-body -->
                                                <div class="panel-footer">
                                                    <div class="col-sm-offset-3 col-sm-6 text-center">
                                                        
                                                    </div>

                                                </div>
                                                <!-- /.box-footer -->
                                            </form>

                                        </div>
                                    </div>
                                </div>                                 
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Cuestionario de evaluación-reacción del curso</h4>
                                        <div class="card-body">

                                            <label><strong>Activar encuesta</strong></label>
                                            <form id="examenActivarForm" class="form-group form-inline">
                                                {{ csrf_field() }}
                                                    
                                                    <div class="form-group form-inline" >
                                                        <label>Fecha Inicio</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaActivarEnc" name="fechaActivar" min="{{ $curso->fechaInicio }}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group form-inline">
                                                        <label>Fecha Fin</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaDesactivarEnc" name="fechaDesactivar" min="{{ $curso->fechaFin }}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                
                                                <input type="hidden" value="{{$curso->id}}" name="curso_id">
                                                <div class="form-group">
                                                    <button class="btn btn-asm float-right" id="subirActivacionEnc">Guardar</button>
                                                </div>
                                            </form>

                                            <label><strong>Vista previa de encuesta</strong></label>

                                        </div>
                                    </div>
                                </div>                                
                            </div>

                        <!--<script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/series-label.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                        <figure class="highcharts-figure">
                            <div id="container"></div>
                            <p class="highcharts-description">
                            Grafica de Ejemplo para los resultado de la evalucion del Ponente
                            </p>
                        </figure>-->

                    </div>
                <!--ASISTENCIA-->
                    <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                        <div class="table-responsive">
                            <table id="tableAsistencia" class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">CURP</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">Hora de Entrada</th>
                                    <th scope="col">Hora de Salida</th>
                                    </tr>
                                </thead>
                                <tbody id="bodyTableAsistencia">
                                    
                                    

                                        <tr>
                                            <th scope="row"></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th>
                                                <!-- Marcacion de los botones segun la asistencia marcada-->
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <input class="text-center" type="time" name="horaEntrada" id="horaEntrada">
                                            </div>
                                            </th>
                                            <th>
                                                <!-- Marcacion de los botones segun la asistencia marcada-->
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <input class="text-center" type="time" name="horaSalida" id="horaSalida">
                                            </div>
                                            </th>
                                    </tr>
                                        
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="invitacion" role="tabpanel" aria-labelledby="invitacion-tab">
                        <h1>INVITACIÓN</h1>
                        <!--Podemos subir el oficio-->
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Subir Archivo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                        </div>
                        </div>
                        <br>
                        <h3>Titular de área: Nombre del Titular del Area</h3><h3>Estatus:(Vista) o (No Vista)</h3>
                        <br>
                        <h3>AREAS</h3>
                        @foreach($areas as $area)
                            {!! $area->nombre !!} <br>
                        @endforeach
                        <br>
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
                //Para los minimos y maximos de fecha de activacion de examen
                document.getElementById("fechaActivar").removeAttribute("min");
                $("#fechaActivar").attr({"min" : data.fechaInicio});
                //Para los minimos y maximos de fecha de activacion de examen
                document.getElementById("fechaDesactivar").removeAttribute("min");
                $("#fechaDesactivar").attr({"min" : data.fechaFin});

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

<!--Agregar y leer de Actividades de Programa con AJAX-->
<script>
    $("#subirActividadDelCurso").click(function (e) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        var actividad = $('#actividad').val();
        var hora = $('#hora').val();
        var token = '{{csrf_token()}}';
        var data={_token:token,curso_id:curso_id,actividad:actividad,hora:hora};
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
            '<td class="pt-3-half">'+
            '<span class="table-up"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-up" aria-hidden="true"></i></a></span>'+
            '<span class="table-down"><a href="#!" class="indigo-text"><i class="fas fa-long-arrow-alt-down" aria-hidden="true"></i></a></span>'+
            '</td>'+
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
                verTabla(curso_id)
            }
        });
    }
    function eliminarTabla(){
        var tablaDatos = $("#actividadesPrograma");
        tablaDatos.empty();
    }
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

<!--examen script-->
<script>
    $(document).ready(function(){
	    var counter = 1;
	    var wrapper = $("#accordionExamen");
	
		 $("#addButton").on("click", function(e){ 
	    	e.preventDefault();
	    	var catgName = prompt("Redacte la pregunta");
			if(catgName == ''){
				catgName = 'Catg#'+counter;
			}
			if(catgName != null){

                /*$.ajax({
                    url: '{{-- route("cuestionario.store") --}}',
                    type: 'POST',
                    data: {pregunta: catgName},
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(response){*/
                                
                        $(wrapper).append(
                            '<div class="col-sm-12" style="margin-bottom: 0;">'+
                                '<div class="card panel panel-default" id="panel'+ counter +'">' + 
                                    '<div class="card-header panel-heading" role="tab" id="heading'+ counter +'">'+
                                        '<h5 class="mb-0 panel-title">'+
                                            '<div class="d-flex">'+
                                                '<a class="mr-auto p-2" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordionExamen" href="#collapse'+ counter +'" ' + 'aria-expanded="true" aria-controls="collapse'+ counter +'"> '+catgName+' </a>'+
                                                '<a href="#" accesskey="'+ counter +'" class="p-2 edit_ctg_label pull-right"><i class="fas fa-pencil-alt"></i></a>' +
                                                '<a style="color:#dd4b39;;" href="#" accesskey="'+ counter +'" class="p-2 remove_ctg_panel exit-btn pull-right"><i class="fas fa-trash-alt"></i></a>' +
                                            '</div>'+
                                        '</h5>'+
                                    '</div>' +
                                    '<div id="collapse'+ counter +'" class="panel-collapse collapse show"role="tabpanel" aria-labelledby="heading'+ counter +'">'+
                                        '<div class="card-body panel-body">'+
                                            '<div id="TextBoxDiv'+ counter +'"></div>'+
                                            '<a class="btn btn-xs btn-primary" accesskey="'+ counter +'" id="addButton3" ><i class="fas fa-plus"></i>&nbsp;Añadir Respuesta</a>' +
                                            '<a class="btn btn-xs btn-success" accesskey="1" id="ajax_submit_button">Guardar</a>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                        counter++;
                        
                    /*},
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });*/


			}
			
	     });
		
		var x = 1;
	     $(wrapper).on("click",".remove_ctg_panel", function(e){ 
				 e.preventDefault(); 
				 var accesskey = $(this).attr('accesskey');
		        $('#panel'+accesskey).remove();
				counter--;
				x--;
	     });
		 
	     var y = 1; 
	     $(wrapper).on("click","#addButton3", function(e){
	         e.preventDefault();
			 var accesskey = $(this).attr('accesskey');
			 y++; 
			 $('#panel'+accesskey).find('#TextBoxDiv'+accesskey).append('<div class="col-lg-12 d-flex"><input type="text" name="ctgtext[]" class="p-2 form-control" style="width: 40%;"/><a href="#" class="d-flex remove_field exit-btn"><i class="fas fa-trash-alt"></i></a></div><br>');
	        
	     });
	     
	     $(wrapper).on("click",".remove_field", function(e){
	         e.preventDefault(); 
	     	$(this).parent('div').remove();y--;
	     })
	  	
	     $(wrapper).on("click",".edit_ctg_label", function(e){ 
	    	var panelId = $(this).attr('accesskey');
			var catgName = prompt("Edite la pregunta");
			if(catgName == ''){
				   return false;
			}
			 if(catgName != null){
				 $('#panel'+panelId).find("#panel-lebel"+panelId).html('').html(catgName);
			}		
		});
    });

    function guardarPregunta(){

    }


</script>


<script>
    function verAsistentes(id) { //Llenar tabla de servicios solicitados
      var id_usuario=$('#id_usuario').val();
        $.ajax({
            url:'/verAsistentes/'+id,
            type:'get',
        }).done(function(response){
            console.log(response)

            let template = '';
            let contador = 0;
            $(response).each(function(key,value){
                contador++;
                template+=`
                <tr>
                    <td>`+contador+`</td>
                    <td>${value.apPaterno} ${value.apMaterno} ${value.name}</td>
                    <td>${value.curp}</td>
                    <td>${value.nombre}</td>
                    <td></td>
                    <td></td>
                </tr>            
                ` 
            });
            $('#bodyTableAsistencia').html(template);
            
        });
      
    }

</script>

<!--
<script>
Highcharts.chart('container', {

title: {
    text: 'Solar Employment Growth by Sector, 2010-2016'
},

subtitle: {
    text: 'Source: thesolarfoundation.com'
},

yAxis: {
    title: {
        text: 'Number of Employees'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 2010 to 2017'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2010
    }
},

series: [{
    name: 'Installation',
    data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
    name: 'Manufacturing',
    data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
    name: 'Sales & Distribution',
    data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
    name: 'Project Development',
    data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
}, {
    name: 'Other',
    data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
        },
        chartOptions: {
            legend: {
                layout: 'horizontal',
                align: 'center',
                verticalAlign: 'bottom'
            }
        }
    }]
}

});
</script>
-->

@endsection
