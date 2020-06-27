@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Datos Personales</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        INFORMACIÓN PERSONAL DEL USUARIO<br>
                        Nombre: {{$usuario->name}} {{$usuario->apPaterno}} {{$usuario->apMaterno}} <br>
                        Correo: {{$usuario->email}} <br>
                        Sexo: {{$usuario->sexo}}<br>
                        Estado Civil: {{$usuario->edoCivil}}<br>
                        Dirección: {{$usuario->calle}} #{{$usuario->nCasa}} Col. {{$usuario->colonia}}<br>
                        Teléfono Celular: {{$usuario->telfono}}<br>
                        CURP: {{$usuario->curp}}<br>
                        No. de Hijos: {{$usuario->nHijos}}<br>
                        Rol: {{$usuario->role->descripcion}}<br>
                        Área de trabajo: {{$area[0]->nombre}}<br>
                        
                    </div>
                </div>
            </div>
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Datos Médicos</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                    @foreach($dataMe as $dM)
                        INFORMACIÓN MÉDICA DEL USUARIO <br>
                        Tipo de Sangre: {{$dM->tipoSangre}}<br>
                        No. IMSS: {{$dM->noImss}}<br>
                        En caso de Emergencia llamar a: {{$dM->nombreEmergencia}}<br>
                        Teléfono de Emergencia: {{$dM->telEmergencia}}<br>
                        Parentesco: {{$dM->parentesco}}<br>
                        Alergias: {{$dM->alergias}}<br>
                        Enfermedades: {{$dM->enfermedades}}<br>
                    @endforeach
                    </div>
                </div>
            </div>
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Datos Escolares</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($dataEs as $dE)
                            INFORMACIÓN ESCOLAR DEL USUARIO<br>
                            Certificado de Primaria: {{$dE->Primaria}}<br>
                            Certificado de Secundaria: {{$dE->Secundaria}}<br>
                            Certificado de Preparatoria: {{$dE->Prepa}}<br>
                            Certificado de Carrera Técnica: {{$dE->cTecnica}}<br>
                            Certificado de Carrera Profesional: {{$dE->cProfesional}}<br>
                            Nombre de Carrera Técnica: {{$dE->nCTecnica}}<br>
                            Nombre de Carrera Profesional: {{$dE->nCProfesional}}<br>
                            Diplomados: {{$dE->diplomados}}<br>
                            No. de Cedula Profesional: {{$dE->noCedula}}<br>
                            Maestrias: {{$dE->Maestrias}}<br>
                            Cursos recibidos enfocados a la actividad en el trabajo: {{$dE->cursosExtra}}<br>
                            Aptitudes como capacitador: {{$dE->hCapacidades}}<br>
                            Descripcion de aptitudes como capacitador: {{$dE->habilidadesDesc}}<br>
                        @endforeach

                       
                    </div>
                </div>
            </div>
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Datos Laborales</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($dataLa as $dL)
                            INFORMACIÓN LABORAL DEL USUARIO <br>
                            Fecha de Ingreso: {{$dL->fechaIngreso}}<br>
                            Nombramiento: {{$dL->nombramiento}}<br>
                            Tipo de Trabajador: {{$dL->tipoTrabajador }}<br>
                            Actividades laborales actuales coinciden con su categoría: {{$dL->actActuales}}<br>
                            Descripción de Actividades Actuales: {{$dL->actActualesDesc}}<br>
                            Responsabilidades actuales: {{$dL->responsabilidades}}<br>
                            Conocimiento de Puesto: {{$dL->Puesto}}<br>
                            Descripción del puesto: {{$dL->descPuesto}}<br>
                            Recibió curso de inducción a la ASM: {{$dL->cursoInduccion}}<br>
                            Descripción de curso de inducción a la ASM: {{$dL->cursoInduccionDesc}}<br>
                            Cargos anteriores: {{$dL->cargosAnt}}<br>
                            Trabajos externos anteriores: {{$dL->trabajosExt}}<br>
                        @endforeach
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Cursos</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">INFO GENERAL</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection