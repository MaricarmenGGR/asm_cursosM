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
                        
                            <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                            @if( Auth::user()->estaInscrito($curso->id) )
                            <a onclick="eliminarTablaMaterial();verMateriales(@php echo $curso->id @endphp);eliminarTabla();verActMat(@php echo $curso->id @endphp)" class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa y Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación de Ponente</a>
                            <a class="nav-item nav-link" id="evaluacionCurso-tab" data-toggle="tab" href="#evaluacionCurso" role="tab" aria-controls="evaluacionCurso" aria-selected="false">Evaluación del Curso</a>
                            @endif
                    </div>
                </nav>
                <!--InformacionCursoUser-->
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header card-header_curso text-center font-weight-bold text-uppercase py-4" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h4 class="text-center font-weight-bold">Información general curso</h4>
                                    </button>
                                </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    {{$curso->descripcionCurso}}
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header card-header_curso text-center font-weight-bold text-uppercase py-4" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="text-center font-weight-bold">Horario</h4>
                                    </button>
                                </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    {{$curso->horaInicio}} - {{$curso->horaFin}}
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header card-header_curso text-center font-weight-bold text-uppercase py-4" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="text-center font-weight-bold">Informacion general del ponente</h4>
                                    </button>
                                </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    Nombre del ponente:  {!! $curso->nombrePonente !!} <br>
                                    Curriculom:  {!! $curso->descripcionPonente !!}
                                </div>
                                </div>
                            </div>
                            <br>
                            @if( ! Auth::user()->estaInscrito($curso->id) )
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#modalInscripcion{{$curso->id}}">
                                            Inscribirme
                                        </button>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <!-- MODAL -->
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
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">NO</button>
                                                <form method="post" action="/inscribirse">
                                                    @csrf
                                                    <input type="number" name="idCurso" value="{{$curso->id}}" hidden>
                                                    <button type="submit" class="btn btn-sm btn-success">SÍ</button>
                                                </form>  
                                        </div>
                                        </div>
                                    </div>
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
                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                        <h2>Evaluación</h2>
                        <br>
                        <br>
                    <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
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
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex1" value="Ex1">
                                <label class="form-check-label" for="Ex1">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue1" value="Bue1">
                                <label class="form-check-label" for="Bue1">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re1" value="Re1">
                                <label class="form-check-label" for="Re1">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def1" value="Def1">
                                <label class="form-check-label" for="Def1">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Fomentó la participación del grupo</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex2" value="Ex2">
                                <label class="form-check-label" for="Ex2">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue2" value="Bue2">
                                <label class="form-check-label" for="Bue2">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re2" value="Re2">
                                <label class="form-check-label" for="Re2">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def2" value="Def2">
                                <label class="form-check-label" for="Def2">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Ilustró el tema con casos prácticos</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex3" value="Ex3">
                                <label class="form-check-label" for="Ex3">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue3" value="Bue3">
                                <label class="form-check-label" for="Bue3">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re3" value="Re3">
                                <label class="form-check-label" for="Re3">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def3" value="Def3">
                                <label class="form-check-label" for="Def3">Deficiente</label>
                                </div>
                            
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td>Dio a conocer los objetivos del curso</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex4" value="Ex4">
                                <label class="form-check-label" for="Ex4">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue4" value="Bue4">
                                <label class="form-check-label" for="Bue4">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re4" value="Re4">
                                <label class="form-check-label" for="Re4">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def4" value="Def4">
                                <label class="form-check-label" for="Def4">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                            <td>Aclaró dudas</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex5" value="Ex5">
                                <label class="form-check-label" for="Ex5">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue5" value="Bue5">
                                <label class="form-check-label" for="Bue5">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re5" value="Re5">
                                <label class="form-check-label" for="Re5">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def5" value="Def5">
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
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex6" value="Ex6">
                                <label class="form-check-label" for="Ex6">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue6" value="Bue6">
                                <label class="form-check-label" for="Bue6">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re6" value="Re6">
                                <label class="form-check-label" for="Re6">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def6" value="Def6">
                                <label class="form-check-label" for="Def6">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">7</th>
                            <td>Los materiales y manuales empleados fueron suficientes</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex7" value="Ex7">
                                <label class="form-check-label" for="Ex7">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue7" value="Bue7>
                                <label class="form-check-label" for="Bue7">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re7" value="Re7">
                                <label class="form-check-label" for="Re7">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def7" value="Def7">
                                <label class="form-check-label" for="Def7">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">8</th>
                            <td>El tiempo programado fue el adecuado para cumplir con el objetivo del curso</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex8" value="Ex8">
                                <label class="form-check-label" for="Ex8">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue8" value="Bue8">
                                <label class="form-check-label" for="Bue8">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re8" value="Re8">
                                <label class="form-check-label" for="Re8">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def8" value="Def8">
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
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex9" value="Ex9">
                                <label class="form-check-label" for="Ex9">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue9" value="Bue9">
                                <label class="form-check-label" for="Bue9">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re9" value="Re9">
                                <label class="form-check-label" for="Re9">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def9" value="Def9">
                                <label class="form-check-label" for="Def9">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">10</th>
                            <td>El funcionamiento del equipo audiovisual fue adecuado</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex10" value="Ex10">
                                <label class="form-check-label" for="Ex10">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue10" value="Bue10">
                                <label class="form-check-label" for="Bue10">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re10" value="Re10">
                                <label class="form-check-label" for="Re10">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def10" value="Def10">
                                <label class="form-check-label" for="Def10">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">11</th>
                            <td>El salón fue adecuado para el curso/taller</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex11" value="Ex11">
                                <label class="form-check-label" for="Ex11">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue11" value="Bue11">
                                <label class="form-check-label" for="Bue11">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re11" value="Re11">
                                <label class="form-check-label" for="Re11">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def11" value="Def11">
                                <label class="form-check-label" for="Def11">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">12</th>
                            <td>El salón fue adecuado para el curso/taller</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex12" value="Ex12">
                                <label class="form-check-label" for="Ex12">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue12" value="Bue12">
                                <label class="form-check-label" for="Bue12">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re2" value="Re12">
                                <label class="form-check-label" for="Re12">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def12" value="Def12">
                                <label class="form-check-label" for="Def12">Deficiente</label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">13</th>
                            <td>La atención por parte del Departamento de Capacitación</td>
                            <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Ex13" value="Ex13">
                                <label class="form-check-label" for="Ex13">Excelente</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Bue13" value="Bue13">
                                <label class="form-check-label" for="Bue13">Bueno</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Re13" value="Re13">
                                <label class="form-check-label" for="Re13">Regular</label>
                                </div>

                                <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Def13" value="Def13">
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
                        <textarea class="form-control" aria-label="sugerencias"></textarea>
                        </div>
                        <br>
                        <button type="button" class="btn btn-asm float-right">Enviar</button>
                        <br>
                    </div>
                     <!--InformacionCursoCapacidadUser-->
                    <div class="tab-pane fade" id="evaluacionCurso" role="tabpanel" aria-labelledby="evaluacionCurso-tab">
                            <h2>Espera a que el administrador del curso active la evaluacíon</h2>
                    </div>
                    
            </div>
        </div>
    </div>
</div>
<!--Ver Programa-->
<script>
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

@endsection