@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <br>
            
            <h2>&nbsp;&nbsp;Curso: $nombre_curso</h2>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs" style="margin-top: 1%;">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        
                            <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                            <a class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa</a>
                            <a class="nav-item nav-link" id="material-tab" data-toggle="tab" href="#material" role="tab" aria-controls="material" aria-selected="false">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación</a>
                            <a class="nav-item nav-link" id="asistencia-tab" data-toggle="tab" href="#asistencia" role="tab" aria-controls="asistencia" aria-selected="false">Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" data-toggle="tab" href="#invitacion" role="tab" aria-controls="invitacion" aria-selected="false">Invitación</a>
                        
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab"><h1>Información del Curso</h1>
                    <div class="card text-white bg-secondary mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10">
                    <div class="card-header">
                    <p>
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsePonente" aria-expanded="false" aria-controls="collapsePonente">
                           Ponente
                        </button>
                        <button class="btn btn-secondary" type="button" data-toggle="collapse" data-target="#collapsePeriodo" aria-expanded="false" aria-controls="collapsePeriodo">
                           Periodo
                        </button>
                    </p>
                    </div>
                    <div class="collapse" id="collapsePonente">
                    <div class="card-body">
                            <h5 class="card-title">Ponente:</h5>
                            <p class="card-text">Nombre del Ponente</p>
                        </div>
                    </div>
                    <div class="collapse" id="collapsePeriodo">
                    <div class="card-body">
                            <h5 class="card-title">Periodo:</h5>
                            <p class="card-text">fecha de Inicio - fecha de Termino</p>
                        </div>
                    </div>
                        <div class="card-body">
                        <p class="card-text">Datos Extraidos de la BD</p>
                        <button type="button" class="btn btn-secondary float-right">Editar</button>
                        </div>
                    </div>
                </div>
                    <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">
                        <h1>Programa del curso</h1>
                        <br>
                        <br>
                    <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <thead class="thead-dark ">
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Actividad</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Material</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Presentacion</td>
                            <td>12:00 Horas</td>
                            <td>Contabilidad pdf</td>
                            </tr>
                        </tbody>
                        </table>
                        <button type="button" class="btn btn-secondary">Editar</button>
                    </div>
                    <div class="tab-pane fade" id="material" role="tabpanel" aria-labelledby="material-tab">
                        <h1>Material</h1>

                    </div>

                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                        <h1>Evaluación</h1>
                        <br>
                        <br>
                        <h5>(E) Excelente, (B) Bueno, (R) Regular, (D) Deficiente</h5>
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
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Fomentó la participación del grupo</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Ilustró el tema con casos prácticos</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td>Dio a conocer los objetivos del curso</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                            <td>Aclaró dudas</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
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
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">7</th>
                            <td>Los materiales y manuales empleados fueron suficientes</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">8</th>
                            <td>El tiempo programado fue el adecuado para cumplir con el objetivo del curso</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
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
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">10</th>
                            <td>El funcionamiento del equipo audiovisual fue adecuado</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">11</th>
                            <td>El salón fue adecuado para el curso/taller</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">12</th>
                            <td>El salón fue adecuado para el curso/taller</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">13</th>
                            <td>La atención por parte del Departamento de Capacitación</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
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

                        <button type="button" class="btn btn-secondary">Editar</button>
                    
                    </div>
                    <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                        <h1>Asistencia</h1>
                    </div>
                    <div class="tab-pane fade" id="invitacion" role="tabpanel" aria-labelledby="invitacion-tab">
                        <h1>INVITACIÓN</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection