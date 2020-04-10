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
                            <td><input type="text" placeholder="Actividad"></td>
                            <td><input type="time" placeholder="Hora"></td>
                            <td><input type="text" placeholder="Material"></td>
                            </tr>
                        </tbody>
                        </table>
                        <button type="button" class="btn btn-secondary">Editar</button>
                    </div>
                    <div class="tab-pane fade" id="material" role="tabpanel" aria-labelledby="material-tab">
                        <h1>MATERIAL</h1>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile02">
                                <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Elija un archivo</label>
                            </div>
                            <div class="input-group-append">
                                <button class="input-group-text" id="inputGroupFileAddon02">Subir</button>
                            </div>
                            </div>
                    </div>

                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                        <h1>Evaluación</h1>
                        <canvas id="myChart" style="max-width: 500px;"></canvas>
                            <div class="col-md-5">
                                <canvas id="myChart"></canvas>
                            </div>
                    </div>
                    <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                        <h1>Asistencia</h1>
                        <br>
                        <br>
                        <h5>(A) Asistio, (F) Falta</h5>
                        <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Apellido Paterno</th>
                            <th scope="col">Apellido Materno</th>
                            <th scope="col">Nombre(s)</th>
                            <th scope="col">Asistencia</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Gonzalez</td>
                            <td>Rodriguez</td>
                            <td>Maricarmen Guadalupe</td>
                            <th>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> A
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> F
                                </label>
                                </div>
                            </th>
                            </tr>
                        </tbody>
                        </table>
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

