@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-12">

            <div class="card mt-3 tab-card">

                <div class="card-header tab-card-header">
                    <ul class="nav nav-tabs btn-pref btn-group btn-group-justified btn-group-lg" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="material-tab" data-toggle="tab" href="#material" role="tab" aria-controls="material" aria-selected="false">Material</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="asistencia-tab" data-toggle="tab" href="#asistencia" role="tab" aria-controls="asistencia" aria-selected="false">Asistencia</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="invitacion-tab" data-toggle="tab" href="#invitacion" role="tab" aria-controls="invitacion" aria-selected="false">Invitación</a>
                        </li>
                    </ul>    
                </div>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">INFO GENERAL</div>
                    <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">PROGRAMA</div>
                    <div class="tab-pane fade" id="material" role="tabpanel" aria-labelledby="material-tab">MATERIAL</div>
                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">EVALUACIÓN</div>
                    <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">ASISTENCIA</div>
                    <div class="tab-pane fade" id="invitacion" role="tabpanel" aria-labelledby="invitacion-tab">INVITACIÓN</div>
                </div>

            </div>


        </div>

    </div>

 </div>


 




@endsection