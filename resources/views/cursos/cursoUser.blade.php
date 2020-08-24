@extends('layouts.menu')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <br>
                
                <div class="text-center">
                    <h1>&nbsp;&nbsp;Curso: {!! $curso->nombreCurso !!}</h1>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-tabs" style="margin-top: 1%;">
                    <nav>
                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <!-- onclick="comprobarFechas(@php echo $curso->id @endphp);"-->
                                <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                                @if( Auth::user()->estaInscrito($curso->id) )
                                    <a onclick="eliminarTablaMaterial();verMateriales(@php echo $curso->id @endphp);eliminarTabla();verActMat(@php echo $curso->id @endphp)" class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa y Material</a>
                                    @if( $curso->examen->fechaActivar != null )
                                        <a class="nav-item nav-link" id="evaluacionCurso-tab" data-toggle="tab" href="#evaluacionCurso" role="tab" aria-controls="evaluacionCurso" aria-selected="false">Evaluación de Conocimientos</a>
                                    @endif
                                    <a onclick="DesactivarNav();DesactivarNavUser();" class="nav-item nav-link" id="evaluacionPonente-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación del Ponente y Desarrollo del Curso</a>
                                @endif
                                <!--verificarRespuesta(@php echo $curso->id @endphp,@php echo Auth::user()->id @endphp); ;DesactivarNavUser();-->
                        </div>
                    </nav>
                    <!--InformacionCursoUser-->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                            
                            <div id="accordion" style="margin-right: 10%; margin-left: 10%;">
                            
                                <div class="card">
                                    <div class="card-header card-header_curso" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-accordion" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Información general del curso
                                        </button>
                                    </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        
                                        <label> <strong>Descripción del curso:</strong> &nbsp; </label><p id="pInfo">{!! $curso->descripcionCurso !!}<p>
                                            <div class="form-row">
                                                <textarea class="form-control" id="descripcionCurso" name="descripcionCurso" cols="50" hidden style="margin-bottom: 15px;">{!! $curso->descripcionCurso !!}</textarea>
                                            </div>

                                            <div class="form-inline">
                                                <label> <strong>Modalidad:</strong> &nbsp; </label>
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
                                                <label> <strong>Lugar:</strong>&nbsp;</label>
                                                <label id="pLugar">{!! $curso->lugar !!}</label>
                                            </div>

                                            <div class="form-inline">
                                                <label><strong>Del:</strong>&nbsp;</label>
                                                <label id="pFechaInicio">{!! $curso->fechaInicio !!}</label>
                                                <label>&nbsp;<strong>al:</strong>&nbsp;</label>
                                                <label id="pFechaFin">{!! $curso->fechaFin !!}</label>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header card-header_curso" id="headingThree">
                                    <h5 class="mb-0">
                                        <button class="btn btn-accordion collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Información del ponente
                                        </button>
                                    </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                            <h4><label id="pNomP">{!! $curso->nombrePonente !!}</label></h4>
                                            <label id="pInfP">{!! $curso->infoPonente !!}</label>
                                    </div>
                                    </div>

                                </div>
                                <div class="card">
                                    <div class="card-header card-header_curso" id="headingTwo">
                                    <h5 class="mb-0">
                                        <button class="btn btn-accordion collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Horario
                                        </button>
                                    </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                            <div class="form-inline">
                                                <label><strong>Horario actual:</strong>&nbsp;</label>
                                                <label id="pHoraInicio">{{ $curso->horaInicio}}</label>
                                                <label>&nbsp;<strong>-</strong>&nbsp;</label>
                                                <label id="pHoraFin">{{ $curso->horaFin}}</label>
                                            </div>

                                            <div class="form-inline">
                                                <label><strong>Horas Totales:</strong>&nbsp;</label>
                                                <label id="pHorasTotales">{{ $curso->horasTotales}}</label>
                                            </div>
                                    </div>
                                    </div>
                                </div>
                                    
                                <br>
                                @if( ! Auth::user()->estaInscrito($curso->id) && $curso->hayCupo($curso->id, Auth::user()->area_id) )
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-8">
                                            <button type="button" class="btn btn-asm btn-block" onclick="inscripcion({{$curso->id}})">
                                                Inscribirme
                                            </button>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>
                                @elseif( ! $curso->hayCupo($curso->id, Auth::user()->area_id) && !Auth::user()->estaInscrito($curso->id) )
                                    <div class="row">
                                        <div class="col-lg-2"></div>
                                        <div class="col-lg-8">
                                        <button disabled type="button" class="btn btn-asm btn-block">
                                            Cupo lleno
                                        </button>
                                        </div>
                                        <div class="col-lg-1"></div>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <!--Programa_MaterialCursoUser-->
                        <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">
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
                                        <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-4">Materiales</h4>
                                        <div class="card-body">
                                        <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-center" style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        
                                                        <th class="text-center">Material</th>
                                                        <th class="text-center"></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="materialesCurso">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--EvaluacionCursoUser-->
                    
                        <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacionPonente-tab">
                        
                            <input type="hidden" value="{{Auth::user()->id}}" id="user_id">
                            <h2 class="text-center">Evaluación del Ponente y Desarrollo del Curso</h2>
                            <br>
                            <br>
                            <form id="formEvaluacion" class="form-group">
                                                {{ csrf_field() }}
                            <input type="hidden" id="curso_idF" name="curso_idF" value="{{$curso->id}}"/>
                        <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center" id="examenTabla">
                        <h3 class="text-center">DEL INSTRUCTOR/CAPACITOR</h3>
                            <thead class="thead-dark text-center">
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">1</th>
                                <td>Dominó el tema que impartió</td>
                                <td>
                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta1" id="Ex1" value="Excelente">
                                    <label class="form-check-label" for="Ex1">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta1" id="Bue1" value="Bueno">
                                    <label class="form-check-label" for="Bue1">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta1" id="Re1" value="Regular">
                                    <label class="form-check-label" for="Re1">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta1" id="Def1" value="Deficiente">
                                    <label class="form-check-label" for="Def1">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">2</th>
                                <td>Fomentó la participación del grupo</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta2" id="Ex2" value="Excelente">
                                    <label class="form-check-label" for="Ex2">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta2" id="Bue2" value="Bueno">
                                    <label class="form-check-label" for="Bue2">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta2" id="Re2" value="Regular">
                                    <label class="form-check-label" for="Re2">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta2" id="Def2" value="Deficiente">
                                    <label class="form-check-label" for="Def2">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">3</th>
                                <td>Ilustró el tema con casos prácticos</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta3" id="Ex3" value="Excelente">
                                    <label class="form-check-label" for="Ex3">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta3" id="Bue3" value="Bueno">
                                    <label class="form-check-label" for="Bue3">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta3" id="Re3" value="Regular">
                                    <label class="form-check-label" for="Re3">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta3" id="Def3" value="Deficiente">
                                    <label class="form-check-label" for="Def3">Deficiente</label>
                                    </div>
                                
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">4</th>
                                <td>Dio a conocer los objetivos del curso</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta4" id="Ex4" value="Excelente">
                                    <label class="form-check-label" for="Ex4">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta4" id="Bue4" value="Bueno">
                                    <label class="form-check-label" for="Bue4">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta4" id="Re4" value="Regular">
                                    <label class="form-check-label" for="Re4">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta4" id="Def4" value="Deficiente">
                                    <label class="form-check-label" for="Def4">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">5</th>
                                <td>Aclaró dudas</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta5" id="Ex5" value="Excelente">
                                    <label class="form-check-label" for="Ex5">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta5" id="Bue5" value="Bueno">
                                    <label class="form-check-label" for="Bue5">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta5" id="Re5" value="Regular">
                                    <label class="form-check-label" for="Re5">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta5" id="Def5" value="Deficiente">
                                    <label class="form-check-label" for="Def5">Deficiente</label>
                                    </div>
                                
                                </td>
                                </tr>
                            </tbody>
                            </table>
                            <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
                        <h3 class="text-center">DEL CURSO/TALLER</h3>
                            <thead class="thead-dark text-center">
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">6</th>
                                <td>Los temas impartidos, contienen un equilibrio teórico-práctico</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta6" id="Ex6" value="Excelente">
                                    <label class="form-check-label" for="Ex6">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta6" id="Bue6" value="Bueno">
                                    <label class="form-check-label" for="Bue6">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta6" id="Re6" value="Regular">
                                    <label class="form-check-label" for="Re6">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta6" id="Def6" value="Deficiente">
                                    <label class="form-check-label" for="Def6">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">7</th>
                                <td>Los materiales y manuales empleados fueron suficientes</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta7" id="Ex7" value="Excelente">
                                    <label class="form-check-label" for="Ex7">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta7" id="Bue7" value="Bueno">
                                    <label class="form-check-label" for="Bue7">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta7" id="Re7" value="Regular">
                                    <label class="form-check-label" for="Re7">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta7" id="Def7" value="Deficiente">
                                    <label class="form-check-label" for="Def7">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">8</th>
                                <td>El tiempo programado fue el adecuado para cumplir con el objetivo del curso</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta8" id="Ex8" value="Excelente">
                                    <label class="form-check-label" for="Ex8">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta8" id="Bue8" value="Bueno">
                                    <label class="form-check-label" for="Bue8">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta8" id="Re8" value="Regular">
                                    <label class="form-check-label" for="Re8">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta8" id="Def8" value="Deficiente">
                                    <label class="form-check-label" for="Def8">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                            </tbody>
                            </table>
                            <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
                        <h3 class="text-center">DE LA ORGANIZACIÓN DEL EVENTO</h3>
                            <thead class="thead-dark text-center">
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th scope="row">9</th>
                                <td>Se entregó el material a tiempo </td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta9" id="Ex9" value="Excelente">
                                    <label class="form-check-label" for="Ex9">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta9" id="Bue9" value="Bueno">
                                    <label class="form-check-label" for="Bue9">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta9" id="Re9" value="Regular">
                                    <label class="form-check-label" for="Re9">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta9" id="Def9" value="Deficiente">
                                    <label class="form-check-label" for="Def9">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">10</th>
                                <td>El funcionamiento del equipo audiovisual fue adecuado</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta10" id="Ex10" value="Excelente">
                                    <label class="form-check-label" for="Ex10">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta10" id="Bue10" value="Bueno">
                                    <label class="form-check-label" for="Bue10">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta10" id="Re10" value="Regular">
                                    <label class="form-check-label" for="Re10">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta10" id="Def10" value="Deficiente">
                                    <label class="form-check-label" for="Def10">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">11</th>
                                <td>El salón fue adecuado para el curso/taller</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta11" id="Ex11" value="Excelente">
                                    <label class="form-check-label" for="Ex11">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta11" id="Bue11" value="Bueno">
                                    <label class="form-check-label" for="Bue11">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta11" id="Re11" value="Regular">
                                    <label class="form-check-label" for="Re11">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta11" id="Def11" value="Deficiente">
                                    <label class="form-check-label" for="Def11">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">12</th>
                                <td>El salón fue adecuado para el curso/taller</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta12" id="Ex12" value="Excelente">
                                    <label class="form-check-label" for="Ex12">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta12" id="Bue12" value="Bueno">
                                    <label class="form-check-label" for="Bue12">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta12" id="Re2" value="Regular">
                                    <label class="form-check-label" for="Re12">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta12" id="Def12" value="Deficiente">
                                    <label class="form-check-label" for="Def12">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <th scope="row">13</th>
                                <td>La atención por parte del Departamento de Capacitación</td>
                                <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta13" id="Ex13" value="Excelente">
                                    <label class="form-check-label" for="Ex13">Excelente</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta13" id="Bue13" value="Bueno">
                                    <label class="form-check-label" for="Bue13">Bueno</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta13" id="Re13" value="Regular">
                                    <label class="form-check-label" for="Re13">Regular</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="pregunta13" id="Def13" value="Deficiente">
                                    <label class="form-check-label" for="Def13">Deficiente</label>
                                    </div>
                                </td>
                                </tr>
                            </tbody>
                            </table>

                            <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Sugerencias y comentarios:</span>
                            </div>
                            <textarea id="sugerenciasCursouser" class="form-control" aria-label="sugerencias"></textarea>
                            </div>
                            <br>
                            <button type="button" class="btn btn-asm float-right" onclick="enviarRespuestas();">Enviar</button>
                            <br>
                        </div>
                        </form>
                        <!--InformacionCursoCapacidadUser-->
                        <div class="tab-pane fade" id="evaluacionCurso" role="tabpanel" aria-labelledby="evaluacionCurso-tab">
                            <div class="row">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-lg-8">

                                    <h2 class="text-center">Evaluación de Conocimientos Adquiridos</h2> <br>
                                        @php 
                                            date_default_timezone_set('America/Mexico_City'); 
                                            $examen_contestado = $curso->examen->estaContestado( $curso->examen->id, Auth::user()->id );  
                                            $horaActual = strtotime(date("d-m-Y H:i:s",time()));
                                            $horaLimite = strtotime($curso->examen->fechaDesactivar);
                                        @endphp
                                        @if( $examen_contestado == null ) 
                                            <!-- examen no ha sido contestado ni ha vencido -->
                                            @if($horaActual < $horaLimite) 
                                            <form action="/responderExamen" method="post" id="formResponderExamen" >   
                                                {{ csrf_field() }} 
                                                @php $preguntas = $curso->examen->obtenerPreguntas( $curso->examen->id ); $counter=0; @endphp    

                                                @foreach( $preguntas as $pregunta )
                                                
                                                    @php $counter = $counter + 1; @endphp
                                                    
                                                        <div class="card panel panel-default" id="panel{{ $counter }}">
                                                            <div class="card-header panel-heading" role="tab" id="heading{{ $counter }}">
                                                                <h5 class="mb-0 panel-title">
                                                                    <div class="d-flex">
                                                                        <a class="mr-auto p-2" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordionExamen" aria-expanded="true" aria-controls="collapse{{ $counter }}"> 
                                                                            <p accesskey="{{ $counter }}" class="d-inline" id="pPregunta_{{ $counter }}"> Pregunta #{{ $counter }}: {{ $pregunta->preguntaTxt }}</p> 
                                                                        </a>
                                                                    </div>
                                                                </h5>
                                                            </div>
                                                            <div class="panel-collapse collapse show"role="tabpanel" aria-labelledby="heading'+{{ $counter }}+'">
                                                                
                                                                    
                                                                    <div class="card-body panel-body">
                                                                        <div id="TextBoxDiv{{ $counter }}">
                                                                            @if( $pregunta->tieneRespuestas( $pregunta->id ) ) 
                                                                                @php $respuestas = $pregunta->obtenerRespuestas( $pregunta->id ); @endphp 
                                                                                @foreach( $respuestas as $respuesta )
                                                                                    <div class="col-lg-12 d-flex">
                                                                                        <label for="respuesta_{{ $counter }}">{{ $respuesta->respuestaTxt }}</label>
                                                                                        <input type="radio" class="form-check-input" name="respuesta_{{ $counter }}" value="{{ $pregunta->id }}_{{ $respuesta->id }}" id="respuesta_{{ $counter }}" required/>
                                                                                    </div>
                                                                                    
                                                                                @endforeach
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                
                                                            </div>
                                                        </div>
                                                        <br>
                                                    
                                                @endforeach
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-6">
                                                        <!--<button class="btn btn-asm btn-block" onclick="enviarEvaluacion()"></button>-->
                                                        <input type="number" name="contador_preguntas" hidden value="{{ $counter }}">
                                                        <input type="number" name="examen_id" hidden value="{{ $curso->examen->id }}">
                                                        <a class="btn btn-asm btn-block" onclick="enviarEvaluacion()" style="color: white;">Enviar Evaluación</a>
                                                    </div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                            </form>
                                            @else
                                            <br>
                                            <h3 class="text-center">El exámen ya ha vencido</h3> <br>
                                            @endif
                                        @elseif( $examen_contestado != null )
                                            @if($horaActual > $horaLimite) 
                                            <!-- examen ha sido contestado y vencio el limite -->
                                            <form action="/responderExamen" method="post" id="formResponderExamen2" >   
                                                
                                                @php $preguntas = $curso->examen->obtenerPreguntas( $curso->examen->id ); $counter=0; @endphp    

                                                @foreach( $preguntas as $pregunta )
                                                
                                                    @php $counter = $counter + 1; @endphp
                                                    
                                                        <div class="card panel panel-default" id="panel{{ $counter }}">
                                                            <div class="card-header panel-heading" role="tab" id="heading{{ $counter }}">
                                                                <h5 class="mb-0 panel-title">
                                                                    <div class="d-flex">
                                                                        <a class="mr-auto p-2" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordionExamen" aria-expanded="true" aria-controls="collapse{{ $counter }}"> 
                                                                            <p accesskey="{{ $counter }}" class="d-inline" id="pPregunta_{{ $counter }}"> Pregunta #{{ $counter }}: {{ $pregunta->preguntaTxt }}</p> 
                                                                        </a>
                                                                    </div>
                                                                </h5>
                                                            </div>
                                                            <div class="panel-collapse collapse show"role="tabpanel" aria-labelledby="heading'+{{ $counter }}+'">
                                                                
                                                                    
                                                                    <div class="card-body panel-body">
                                                                        <div id="TextBoxDiv{{ $counter }}">
                                                                            @if( $pregunta->tieneRespuestas( $pregunta->id ) ) 
                                                                                @php $respuestas = $pregunta->obtenerRespuestas( $pregunta->id ); @endphp 
                                                                                @foreach( $respuestas as $respuesta )
                                                                                    <div class="col-lg-12 d-flex">
                                                                                        
                                                                                    @php $contestacion = $examen_contestado->obtenerContestacionUsuario( $examen_contestado->id,$pregunta->id,$respuesta->id )  @endphp
                                                                                    
                                                                                    @if( $contestacion != null )
                                                                                        
                                                                                        @if( $contestacion->correcto == 1 )
                                                                                            <label for="" style="color: green;">{{ $respuesta->respuestaTxt }} ✓ </label>
                                                                                        @else
                                                                                            <label for="" style="color: red;"><s>{{ $respuesta->respuestaTxt }}</s></label>
                                                                                        @endif
                                                                                            <input class="form-check-input" type="radio" name="" checked >
                                                                                    @else
                                                                                        
                                                                                        @if( $respuesta->correcto == 1 )
                                                                                            <label for=""><strong>{{ $respuesta->respuestaTxt }} ← </strong></label>
                                                                                        @else
                                                                                            <label for="">{{ $respuesta->respuestaTxt }}</label>
                                                                                        @endif
                                                                                            <input class="form-check-input" type="radio" name="" disabled >
                                                                                    @endif
                                                                                    </div>

                                                                                @endforeach
                                                                                
                                                                            @endif
                                                                        </div>
                                                                    </div>

                                                                
                                                            </div>
                                                        </div>
                                                        <br>
                                                    
                                                @endforeach
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-3"></div>
                                                    <div class="col-lg-6"> 
                                                        <h3 class="text-center">Calificación: {{$examen_contestado->calificacion}} </h3> <br>
                                                    </div>
                                                    <div class="col-lg-2"></div>
                                                </div>
                                            </form>
                                            @else
                                            <br>
                                            <h3 class="text-center">Más tarde se le mostrarán sus resultados</h3> <br>
                                            @endif
                                        @endif


                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                </div>


                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

<!--Ver Programa-->
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

<script>
        
        $( document ).ready(function() {
            DesactivarNav();DesactivarNavUser();
        });
     function verActMat(id){
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
            '</tr>');
            });
        })
     }
     function eliminarTabla(){
        var tablaDatos = $("#actividadesPrograma");
        tablaDatos.empty();
    }
</script>
<!--ver Materiales-->
<script>
    function verMateriales(id){
        $.ajax({
            url:'/verMateriales/'+id,
            type:'get',
        }).done(function(res){
            var tablaDatos = $("#materialesCurso");
            $(res).each(function(key,value){
                tablaDatos.append(
                '<tr class="hide">'+
                '<td class="pt-3-half">'+value.url+'</td>'+
                '<td>'+
                '<span class="table-remove"><button type="button" class="btn btn-asm btn-rounded btn-sm my-0 waves-effect waves-light" value="'+value.id+'""><a href="/download/'+value.id+'">Download</a></button></span>'+
                '</td>'+
                '</tr>')
            });
        });
    }
    function eliminarTablaMaterial(){
        var tablaDatos = $("#materialesCurso");
        tablaDatos.empty();
    }
    function Descarga(btn){
        $.ajax({
            url: "/download/"+btn.value,
            type:'get'
        });

    }
</script>
<!--BackEvaluacionPonenete-->
<script>
    function verificarRespuesta(id_curso,id_user){
        var respuesta;
        $.ajax({
            async: false,
            url: '/verificarRespuestas/'+id_curso+'/'+id_user,
            type:'GET',
            success:(function(res){
                $(res).each(function(key,value){
                  //  console.log('IMPRIMO->: '+value.Excelente);
                 respuesta = res;
                });
            })
        });
        //return true;
        //console.log(respuesta);
        if(respuesta.length!=0){
            return true;
        }else{
            return false;
        }

    }

    function comprobarFechas(id){
      var respuesta;
      var FechaInicio;
      var FechaTermino;
      $.ajax({
          async:false,
          url:'/fechas/'+id,
          type: 'GET',
          success:(function(res){
            $(res).each(function(key,value){
                 FechaInicio = value.fechaEmision;
                 FechaTermino = value.fechaTermino;
                 respuesta = res;
                });
          })
      });
      //console.log(respuesta);
      //console.log("Fecha inicio: "+FechaInicio);
        //console.log("Fecha termino: "+ FechaTermino);
        if(respuesta === undefined){
            return false;
        }
                var f = new Date();
                var Hoy = f.getFullYear()+'-'+(f.getMonth() +1)+'-'+f.getDate()
                console.log(Hoy);
                if(respuesta.length!=0){
                    if(Hoy=FechaInicio||((Hoy>FechaInicio) && (Hoy<=fechaTermino))){
                        console.log('Esta en tiempo');
                        return true;
                    }else{
                        console.log('Ya no esta en tiempo');
                        return false;
                    }
                }else{
                    return false;
                }
       
    }
    function DesactivarNavUser(){
        var curso_id = $('#curso_idF').val();
        var usuario_id = $('#user_id').val();
        const tab = document.getElementById("evaluacionPonente-tab");
       if(verificarRespuesta(curso_id,usuario_id)==true){
            console.log('entra aqui Verdadero');
            tab.setAttribute('class', 'nav-item nav-link disabled');
            tab.setAttribute("hidden", true);;
       
       }else if(verificarRespuesta(curso_id,usuario_id)==false){
           console.log('entra Falso');
        //Pagina.removeAttribute('class','nav-item nav-link');
       // tab.setAttribute('class', 'nav-item nav-link disabled');
       }else{
           console.log('No se valido');
       };
    }
    function DesactivarNav(){
        var curso_id = $('#curso_idF').val();
        var usuario_id = $('#user_id').val();
        const Pagina = document.getElementById("evaluacionPonente-tab");
       if(comprobarFechas(curso_id)==false){
        Pagina.setAttribute('class', 'nav-item nav-link disabled');
        Pagina.setAttribute("hidden", true);;
        console.log('NO Esta en fecha');
       }else if(comprobarFechas(curso_id)==true){
           console.log('Esta en fecha');
        //Pagina.removeAttribute('class','nav-item nav-link');
       // Pagina.setAttribute('class', 'nav-item nav-link disabled');
       }else{
           console.log('Error al validar');
       };
       
    }

    function enviarRespuestas(){
        var respuestas = new Array();
        var comentarios = $('#sugerenciasCursouser').val();
        var usuario_id = $('#user_id').val();
        var curso_id = $('#curso_idF').val();
        ///Contadores///
        var ExcelenteC =0;
        var BuenoC = 0;
        var RegunarC = 0;
        var DeficienteC = 0;
        for( var i = 1; i<=13; i++){
            var num = i.toString();
            if($('input[name="pregunta'+num+'"]').is(':checked')){
                var pregunta = $('input[name="pregunta'+num+'"]:checked').val();
                respuestas.push(pregunta);
                
            }else{
                alert('La pregunta: '+num+' no tiene respuesta');
            }
        }
        
       if(respuestas.length!=13){
            alert('Las respuestas no se enviaran hasta que este completo el cuestionario');
       }else{
        for (var i = 0; i < respuestas.length; i++) {
            if(respuestas[i]=="Excelente"){
                ExcelenteC = ExcelenteC + 1;
            }else if(respuestas[i]=="Bueno"){
                BuenoC = BuenoC+1;
            }else if(respuestas[i]=="Regular"){
                RegunarC = RegunarC +1;
            }else{
                DeficienteC = DeficienteC +1 ;
            }
        }
        console.log(ExcelenteC);
        console.log(BuenoC);
        console.log(RegunarC);
        console.log(DeficienteC);
        console.log(usuario_id);
        

        var token = '{{csrf_token()}}';
        var data={_token:token,curso_id:curso_id,user_id:usuario_id,Excelente:ExcelenteC,Bueno:BuenoC,Regular:RegunarC,Deficiente:DeficienteC,Comentarios:comentarios};
        $.ajax({
        type: "POST",
        url: '/agregarRespuesta',
        data: data,
        success: function(response){
            Swal.fire({
                icon: 'success',
                title: 'La prueba fue enviada Exitosamente',
                showConfirmButton: false,
                timer: 1500
            });
            console.log(data);
            location.reload();
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

        }
    }

</script>

<!--Evaluacion Cononocimientos-->
<script>
    function enviarEvaluacion(){
        //$("#formResponderExamen").submit();
        //formResponderExamen
        var frm=$("#formResponderExamen");
        var datos = frm.serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/responderExamen',
            data:datos,
            success:function(data){
                location.reload();
            },
            error:function(x,xs,xt){
                alert(x.responseText);
            }
        });
    }
</script>

<!-- Cronometro -->
<script>
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

window.onload = function () {
    var fiveMinutes = 60 * 5,
        display = document.querySelector('#time');
    startTimer(fiveMinutes, display);
};
</script>

@endsection