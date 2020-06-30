@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill text-center" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true" onclick="editInfo()">Datos Personales <i class="fas fa-pencil-alt" aria-hidden="true" style='font-size:24px'></i></a>
                        
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="text-center">INFORMACIÓN PERSONAL DEL USUARIO</h3>
                        <div><label id="nombre">Nombre: {{$usuario->name}} {{$usuario->apPaterno}} {{$usuario->apMaterno}}</label></div>
                        <div><label id="correo">Correo: {{$usuario->email}}</label></div>
                        <div><label id="sexo">Sexo: {{$usuario->sexo}}</label></div>
                        <div><label id="edoCivil">Civil: {{$usuario->edoCivil}}</label></div>
                        <div><label id="direccion">Dirección: {{$usuario->calle}} #{{$usuario->nCasa}} Col. {{$usuario->colonia}}</label></div>
                        <div><label id="celular">Teléfono Celular: {{$usuario->telfono}}</label></div>
                        <div><label id="curp">CURP: {{$usuario->curp}}</label></div>
                        <div><label id="nHijos">No. de Hijos: {{$usuario->nHijos}}</label></div>
                        <div><label id="rol">Rol: {{$usuario->role->descripcion}}</label></div>
                        <div><label id="area">Área de trabajo: {{$area[0]->nombre}}</label></div>
                        <form id="datosPersonalesInfo">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <label id="LName" hidden>Nombre:</label>
                                <textarea class="form-control" id="nameEdit" name="nameEdit" cols="25" hidden style="margin-bottom: 15px;">{{$usuario->name}} {{$usuario->apPaterno}} {{$usuario->apMaterno}}</textarea>
                            </div>
                            <label id="LCorreo" hidden>Correo: </label>
                            <input hidden type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}" style="margin-bottom: 5px;">

                            <label id="LedoCivil" hidden>Estado Civil: </label>
                                <select class="custom-select" name="edoCivil" id="modalidad" style="margin-bottom: 5px;" hidden>
                                <option selected>Casado</option>
                                <option value="Soltero">Soltero</option>
}                               <option value="Divorciado">Divorciado</option>
                                <option value="Separación en proceso Judicial">Separación en proceso Judicial</option>
                                <option value="Viudo">Viudo</option>
                                <option value="Concubinato">Concubinato</option>
                                </select>

                            <label id="LCalle" hidden>Calle: </label>
                            <input hidden type="text" class="form-control" id="calleEdit" name="calleEdit" value="{{$usuario->calle}}" style="margin-bottom: 5px;">

                            <label id="LNo" hidden>Colonia: </label>
                            <input hidden type="text" class="form-control" id="coloniaEdit" name="coloniaEdit" value="{{$usuario->colonia}}" style="margin-bottom: 5px;">

                            <label id="LCol" hidden>No.Casa: </label>
                            <input hidden type="text" class="form-control" id="casaEdit" name="casaEdit" value="#{{$usuario->nCasa}}" style="margin-bottom: 5px;">

                            <label id="LCel" hidden>Teléfono Celular: </label>
                            <input hidden type="text" class="form-control" id="celularEdit" name="celularEdit" value="{{$usuario->telfono}}" style="margin-bottom: 5px;">

                            <label id="LHijos" hidden>No. de Hijos: </label>
                            <input hidden type="number" class="form-control" id="nHijosEdit" name="nHijosEdit" value="{{$usuario->nHijos}}" style="margin-bottom: 5px;">

                            <div><label id="sexoEdit" hidden>Sexo: {{$usuario->sexo}}</label></div>
                            <div><label id="curpEdit" hidden>CURP: {{$usuario->curp}}</label></div>
                            <div><label id="rolEdit" hidden>Rol: {{$usuario->role->descripcion}}</label></div>
                            <div><label id="areaEdit" hidden>Área de trabajo: {{$area[0]->nombre}}</label></div>

                            <div>
                            <a class="btn btn-danger float-right" id="cancelInfo" onclick="cancelInfo()" hidden style="margin-top: 10px; margin-bottom: 10px; margin-left: 5px; color: white;">Cancelar</a>
                            <button type="submit" class="btn btn-asm float-right" id="updateInfo" hidden style="margin-top: 10px; margin-bottom: 10px;">Guardar</button>
                            </div>
                            <br>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true" onclick="editInfoMedicos()">Datos Medicos <i class="fas fa-pencil-alt" aria-hidden="true" style='font-size:24px'></i></a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                    @foreach($dataMe as $dM)
                        <h3 class="text-center">INFORMACIÓN MÉDICA DEL USUARIO</h3>
                        <div><label id="tipoSangre">Tipo de Sangre: {{$dM->tipoSangre}}</label></div>
                        <div><label id="noImss">No. IMSS: {{$dM->noImss}}</label></div>
                        <div><label id="personaEmerg">En caso de Emergencia llamar a: {{$dM->nombreEmergencia}}</label></div>
                        <div><label id="telEmerg">Teléfono de Emergencia: {{$dM->telEmergencia}}</label></div>
                        <div><label id="parentesco">Parentesco: {{$dM->parentesco}}</label></div>
                        <div><label id="alergias">Alergias: {{$dM->alergias}}</label></div>
                        <div><label id="enfermedades">Enfermedades: {{$dM->enfermedades}}</label></div>
                        <form id="datosMedicosUser">
                            {{ csrf_field() }}
                            <label id="LSangre" hidden>Tipo de Sangre: </label>
                            <select class="custom-select" name="sangreTipo" id="sangretipo" style="margin-bottom: 5px;" hidden>
                                        <option disabled>Elige un Tipo</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                            </select>
                            <label id="LNoImss" hidden>No. IMSS</label>
                            <input hidden type="text" class="form-control" id="editImss" name="editImss" value="{{$dM->noImss}}" style="margin-bottom: 5px;">

                            <label id="LPersonaEmerg" hidden>En caso de Emergencia Llamar a: </label>
                            <input hidden type="text" class="form-control" id="editPEmerge" name="editPEmerge" value="{{$dM->nombreEmergencia}}" style="margin-bottom: 5px;">

                            <label id="LTelefonoEmer" hidden>Teléfono de Emergencia</label>
                            <input hidden type="text" class="form-control" id="editTelEmer" name="editTelEmer" value="{{$dM->telEmergencia}}" style="margin-bottom: 5px;">

                            <label id="LParen" hidden>Parentesco</label>
                            <input hidden type="text" class="form-control" id="editParen" name="editParen" value="{{$dM->parentesco}}" style="margin-bottom: 5px;">

                            <label id="LAlergias" hidden>Alergias</label>
                            <textarea hidden type="text" class="form-control" id="editAler" name="editAler" value="{{$dM->alergias}}" style="margin-bottom: 5px;"></textarea>

                            <label id="LEnfermedades" hidden>Enfermedades Cronicas: </label>
                            <textarea hidden type="text" class="form-control" id="editEnf" name="editEnf" value="{{$dM->enfermedades}}" style="margin-bottom: 5px;"></textarea>

                            <div>
                            <a class="btn btn-danger float-right" id="cancelInfoMedic" onclick="cancelInfoMedicos()" hidden style="margin-top: 10px; margin-bottom: 10px; margin-left: 5px; color: white;">Cancelar</a>
                            <button type="submit" class="btn btn-asm float-right" id="updateInfoMedic" hidden style="margin-top: 10px; margin-bottom: 10px;">Guardar</button>
                            </div>
                            <br>


                        </form>
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

<script>
    //Edicion de Datos personales//
    function editInfo(){
        document.getElementById("updateInfo").removeAttribute("hidden");
        document.getElementById("cancelInfo").removeAttribute("hidden");

        document.getElementById("nombre").setAttribute("hidden", true);
        document.getElementById("correo").setAttribute("hidden",true);
        document.getElementById("edoCivil").setAttribute("hidden",true);
        document.getElementById("direccion").setAttribute("hidden",true);
        document.getElementById("celular").setAttribute("hidden",true);
        document.getElementById("nHijos").setAttribute("hidden",true);
        document.getElementById("sexo").setAttribute("hidden",true);
        document.getElementById("curp").setAttribute("hidden",true);
        document.getElementById("rol").setAttribute("hidden",true);
        document.getElementById("area").setAttribute("hidden",true);

        document.getElementById("LName").removeAttribute("hidden");
        document.getElementById("nameEdit").removeAttribute("hidden");
        document.getElementById("LCorreo").removeAttribute("hidden");
        document.getElementById("email").removeAttribute("hidden");
        document.getElementById("LedoCivil").removeAttribute("hidden");
        document.getElementById("modalidad").removeAttribute("hidden");
        document.getElementById("LCalle").removeAttribute("hidden");
        document.getElementById("calleEdit").removeAttribute("hidden");
        document.getElementById("LNo").removeAttribute("hidden");
        document.getElementById("casaEdit").removeAttribute("hidden");
        document.getElementById("LCol").removeAttribute("hidden");
        document.getElementById("coloniaEdit").removeAttribute("hidden");
        document.getElementById("LCel").removeAttribute("hidden");
        document.getElementById("celularEdit").removeAttribute("hidden");
        document.getElementById("LHijos").removeAttribute("hidden");
        document.getElementById("nHijosEdit").removeAttribute("hidden");
        document.getElementById("sexoEdit").removeAttribute("hidden");
        document.getElementById("curpEdit").removeAttribute("hidden");
        document.getElementById("rolEdit").removeAttribute("hidden");
        document.getElementById("areaEdit").removeAttribute("hidden");
  
    }

    function cancelInfo(){
        document.getElementById("updateInfo").setAttribute("hidden", true);
        document.getElementById("cancelInfo").setAttribute("hidden", true);

        document.getElementById("nombre").removeAttribute("hidden");
        document.getElementById("correo").removeAttribute("hidden");
        document.getElementById("edoCivil").removeAttribute("hidden");
        document.getElementById("direccion").removeAttribute("hidden");
        document.getElementById("celular").removeAttribute("hidden");
        document.getElementById("nHijos").removeAttribute("hidden");
        document.getElementById("sexo").removeAttribute("hidden");
        document.getElementById("curp").removeAttribute("hidden");
        document.getElementById("rol").removeAttribute("hidden");
        document.getElementById("area").removeAttribute("hidden");

        document.getElementById("LName").setAttribute("hidden",true);
        document.getElementById("nameEdit").setAttribute("hidden",true);
        document.getElementById("LCorreo").setAttribute("hidden",true);
        document.getElementById("email").setAttribute("hidden",true);
        document.getElementById("LedoCivil").setAttribute("hidden",true);
        document.getElementById("modalidad").setAttribute("hidden",true);
        document.getElementById("LCalle").setAttribute("hidden",true);
        document.getElementById("calleEdit").setAttribute("hidden",true);
        document.getElementById("LNo").setAttribute("hidden",true);
        document.getElementById("casaEdit").setAttribute("hidden",true);
        document.getElementById("LCol").setAttribute("hidden",true);
        document.getElementById("coloniaEdit").setAttribute("hidden",true);
        document.getElementById("LCel").setAttribute("hidden",true);
        document.getElementById("celularEdit").setAttribute("hidden",true);
        document.getElementById("LHijos").setAttribute("hidden",true);
        document.getElementById("nHijosEdit").setAttribute("hidden",true);
        document.getElementById("sexoEdit").setAttribute("hidden",true);
        document.getElementById("curpEdit").setAttribute("hidden",true);
        document.getElementById("rolEdit").setAttribute("hidden",true);
        document.getElementById("areaEdit").setAttribute("hidden",true);
    }

    //Edicion de Datos Medicos
    function editInfoMedicos(){
        document.getElementById("updateInfoMedic").removeAttribute("hidden");
        document.getElementById("cancelInfoMedic").removeAttribute("hidden");

        document.getElementById("tipoSangre").setAttribute("hidden", true);
        document.getElementById("noImss").setAttribute("hidden",true);
        document.getElementById("personaEmerg").setAttribute("hidden",true);
        document.getElementById("telEmerg").setAttribute("hidden",true);
        document.getElementById("parentesco").setAttribute("hidden",true);
        document.getElementById("alergias").setAttribute("hidden",true);
        document.getElementById("enfermedades").setAttribute("hidden",true);

        document.getElementById("sangretipo").removeAttribute("hidden");
        document.getElementById("LSangre").removeAttribute("hidden");
        document.getElementById("LNoImss").removeAttribute("hidden");
        document.getElementById("editImss").removeAttribute("hidden");
        document.getElementById("editPEmerge").removeAttribute("hidden");
        document.getElementById("editTelEmer").removeAttribute("hidden");
        document.getElementById("editParen").removeAttribute("hidden");
        document.getElementById("editAler").removeAttribute("hidden");
        document.getElementById("editEnf").removeAttribute("hidden");
        document.getElementById("LPersonaEmerg").removeAttribute("hidden");
        document.getElementById("LTelefonoEmer").removeAttribute("hidden");
        document.getElementById("LParen").removeAttribute("hidden");
        document.getElementById("LAlergias").removeAttribute("hidden");
        document.getElementById("LEnfermedades").removeAttribute("hidden");

    }

    function cancelInfoMedicos(){
        document.getElementById("updateInfoMedic").setAttribute("hidden", true);
        document.getElementById("cancelInfoMedic").setAttribute("hidden", true);

        document.getElementById("tipoSangre").removeAttribute("hidden");
        document.getElementById("noImss").removeAttribute("hidden");
        document.getElementById("personaEmerg").removeAttribute("hidden");
        document.getElementById("telEmerg").removeAttribute("hidden");
        document.getElementById("parentesco").removeAttribute("hidden");
        document.getElementById("alergias").removeAttribute("hidden");
        document.getElementById("enfermedades").removeAttribute("hidden");

        document.getElementById("sangretipo").setAttribute("hidden", true);
        document.getElementById("LSangre").setAttribute("hidden", true);
        document.getElementById("LNoImss").setAttribute("hidden", true);
        document.getElementById("editImss").setAttribute("hidden", true);
        document.getElementById("editPEmerge").setAttribute("hidden", true);
        document.getElementById("editTelEmer").setAttribute("hidden", true);
        document.getElementById("editParen").setAttribute("hidden", true);
        document.getElementById("editAler").setAttribute("hidden", true);
        document.getElementById("editEnf").setAttribute("hidden", true);
        document.getElementById("LPersonaEmerg").setAttribute("hidden", true);
        document.getElementById("LTelefonoEmer").setAttribute("hidden", true);
        document.getElementById("LParen").setAttribute("hidden", true);
        document.getElementById("LAlergias").setAttribute("hidden", true);
        document.getElementById("LEnfermedades").setAttribute("hidden", true);

    }
    //Editar los datos Escolares
    
</script>
@endsection

                                        