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
                    <div class="card text-white bg-secondary mb-4" style="max-width: 100rem;">
                    <div class="card-header">Ponente: {un ponente}</div>
                        <div class="card-body">
                            <h5 class="card-title">Periodo:{fechas de inicio - fecha de termino}</h5>
                            <p class="card-text">Informacion extraida de BD</p>
                        </div>
                        <button type="button" class="btn btn-secondary text-right">Editar</button>
                    </div>
                </div>
                    <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">
                        <h1>Programa del curso</h1>
                    <table class="table">
                        <thead class="thead-dark">
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
                        <button type="button" class="btn btn-secondary text-right">Editar</button>
                    </div>
                    <div class="tab-pane fade" id="material" role="tabpanel" aria-labelledby="material-tab">
                        <h1>Material</h1>

                    </div>

                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                        <h1>Evaluación</h1>

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