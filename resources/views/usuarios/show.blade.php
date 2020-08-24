@extends('layouts.menu')
@section('content')

@if( Auth::user()->area_id == 10  || $usuario->area->id == 10 )
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill text-center" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Datos Personales</a>
                        
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <input hidden id="id_User" value="{{$usuario->id}}">
                        <div><label id="Mnombre"><strong>Nombre:</strong> {{$usuario->name}} {{$usuario->apPaterno}} {{$usuario->apMaterno}}</label></div>
                        <div><label id="Mcorreo"><strong>Correo:</strong> {{$usuario->email}}</label></div>
                        <div><label id="Mcelular"><strong>Teléfono Celular:</strong> {{$usuario->telfono}}</label></div>
                        <div><label id="Mcurp"><strong>Cargo:</strong> {{$usuario->cargo}}</label></div>
                        <div><label id="Mcurp"><strong>Puesto:</strong> {{$usuario->puesto}}</label></div>
                        <div><label id="Marea"><strong>Dependencia:</strong> {{$usuario->dependencia}}</label></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
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
                        <input hidden id="id_User" value="{{$usuario->id}}">
                        <div><label id="Mnombre">Nombre: {{$usuario->name}} {{$usuario->apPaterno}} {{$usuario->apMaterno}}</label></div>
                        <div><label id="Mcorreo">Correo: {{$usuario->email}}</label></div>
                        <div><label id="Medad">Edad: {{$usuario->edad}}</label></div>
                        <div><label id="Msexo">Sexo: {{$usuario->sexo}}</label></div>
                        <div><label id="MedoCivil">Estado Civil: {{$usuario->edoCivil}}</label></div>
                        <div><label id="Mdireccion">Dirección: {{$usuario->calle}} #{{$usuario->nCasa}} Col. {{$usuario->colonia}}</label></div>
                        <div><label id="Mcelular">Teléfono Celular: {{$usuario->telfono}}</label></div>
                        <div><label id="Mcurp">CURP: {{$usuario->curp}}</label></div>
                        <div><label id="MnHijos">No. de Hijos: {{$usuario->nHijos}}</label></div>
                        <div><label id="Mrol">Rol: {{$usuario->role->descripcion}}</label></div>
                        <div><label id="Marea">Área de trabajo: {{$area[0]->nombre}}</label></div>
                        <form id="datosPersonalesInfo">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <label id="LName" hidden>Nombre:</label>
                                <input class="form-control" id="name" name="name" cols="25" hidden style="margin-bottom: 15px;" value = "{{$usuario->name}}">
                                <label id="LaPaterno" hidden>Apellido Paterno:</label>
                                <input class="form-control" id="apPaterno" name="apPaterno" cols="25" hidden style="margin-bottom: 15px;" value = "{{$usuario->apPaterno}}">
                                <label id="LaMaterno" hidden>Apellido Materno:</label>
                                <input class="form-control" id="apMaterno" name="apMaterno" cols="25" hidden style="margin-bottom: 15px;" value = "{{$usuario->apMaterno}}">
                            </div>
                            <label id="LCorreo" hidden>Correo: </label>
                            <input hidden type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}" style="margin-bottom: 5px;">
                            
                            <label id="LEdad" hidden>Edad: </label>
                            <input hidden type="number" class="form-control" id="edad" name="edad" value="{{$usuario->edad}}" style="margin-bottom: 5px;">
                            
                            <label id="LedoCivil" hidden>Estado Civil: </label>
                                <select class="custom-select" name="edoCivil" id="edoCivil" style="margin-bottom: 5px;" hidden>
                                <option selected>Casado</option>
                                <option value="Soltero">Soltero</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Separación en proceso Judicial">Separación en proceso Judicial</option>
                                <option value="Viudo">Viudo</option>
                                <option value="Concubinato">Concubinato</option>
                                </select>

                            <label id="LCalle" hidden>Calle: </label>
                            <input hidden type="text" class="form-control" id="calle" name="calle" value="{{$usuario->calle}}" style="margin-bottom: 5px;">

                            <label id="LCol" hidden>Colonia: </label>
                            <input hidden type="text" class="form-control" id="colonia" name="colonia" value="{{$usuario->colonia}}" style="margin-bottom: 5px;">

                            <label id="LNo" hidden>No.Casa: </label>
                            <input hidden type="text" class="form-control" id="nCasa" name="nCasa" value="{{$usuario->nCasa}}" style="margin-bottom: 5px;">

                            <label id="LCel" hidden>Teléfono Celular: </label>
                            <input hidden type="text" class="form-control" id="telfono" name="telfono" value="{{$usuario->telfono}}" style="margin-bottom: 5px;">

                            <label id="LHijos" hidden>No. de Hijos: </label>
                            <input hidden type="number" class="form-control" id="nHijos" name="nHijos" value="{{$usuario->nHijos}}" style="margin-bottom: 5px;">

                            
                            <div><label id="sexo" hidden>Sexo: {{$usuario->sexo}}</label></div>
                            <div><label id="curp" hidden>CURP: {{$usuario->curp}}</label></div>
                            <!--<div><label id="role_id" hidden>Rol: {{$usuario->role->id}}</label></div>
                                <div><label id="area_id" hidden>Área de trabajo: {{$area[0]->id}}</label></div>-->
                       

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
                    <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true" onclick="editInfoEscolar()">Datos Escolares <i class="fas fa-pencil-alt" aria-hidden="true" style='font-size:24px'></i></a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($dataEs as $dE)
                            <div><label id="Mprimaria">Certificado de Primaria: {{$dE->Primaria}}</label></div>
                            <div><label id="Msecundaria">Certificado de Secundaria: {{$dE->Secundaria}}</label></div>
                            <div><label id="Mprepa">Certificado de Preparatoria: {{$dE->Prepa}}</label></div>
                            <div><label id="McTecnica">Certificado de Carrera Técnica: {{$dE->cTecnica}}</label></div>
                            <div><label id="McProfesional">Certificado de Carrera Profesional: {{$dE->cProfesional}}</label></div>
                            <div><label id="MnTec">Nombre de Carrera Técnica: {{$dE->nCTecnica}}</label></div>
                            <div><label id="MnCProf">Nombre de Carrera Profesional: {{$dE->nCProfesional}}</label></div>
                            <div><label id="MDiplomados">Diplomados: {{$dE->diplomados}}</label></div>
                            <div><label id="MNoCedula">No. de Cedula Profesional: {{$dE->noCedula}}</label></div>
                            <div><label id="MMaestrias">Maestrias: {{$dE->Maestrias}}</label></div>
                            <div><label id="MCursosTrabajo">Cursos recibidos enfocados a la actividad en el trabajo: {{$dE->cursosExtra}}</label></div>
                            <div><label id="MaptitudesCapa">Aptitudes como capacitador: {{$dE->hCapacidades}}</label></div>
                            <div><label id="MDescApt">Descripcion de aptitudes como capacitador: {{$dE->habilidadesDesc}}</label></div>
                            <form id="infoEscolar">
                                {{ csrf_field() }}
                                <label id="LPrimaria" hidden>Certificado de Primaria:</label>
                                <select class="custom-select" name="Primaria" id="Primaria" style="margin-bottom: 5px;" hidden>
                                        <option disabled>Elige una opción</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                </select>

                                <label id="LSecu" hidden>Certificado de Secundaria:</label>
                                <select class="custom-select" name="Secundaria" id="Secundaria" style="margin-bottom: 5px;" hidden>
                                        <option disabled>Elige una opción</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                </select>

                                <label id="LPrepa" hidden>Certificado de Preparatoria:</label>
                                <select class="custom-select" name="Prepa" id="Prepa" style="margin-bottom: 5px;" hidden>
                                        <option disabled>Elige una opción</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                </select>

                                <label id="LTecnica" hidden>Certificado de Carrera Técnica:</label>
                                <select class="custom-select" name="cTecnica" id="cTecnica" style="margin-bottom: 5px;" hidden>
                                        <option disabled>Elige una opción</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                </select>

                                <label id="LProfe" hidden>Certificado de Carrera Profesional:</label>
                                <select class="custom-select" name="cProfesional" id="cProfesional" style="margin-bottom: 5px;" hidden>
                                        <option disabled>Elige una opción</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                </select>

                                <label id="LNCarreraTec" hidden>Nombre de Carrera Técnica: </label>
                                <input hidden type="text" class="form-control" id="nCTecnica" name="nCTecnica" value="{{$dE->nCTecnica}}" style="margin-bottom: 5px;">
                                
                                <label id="LNCarreraProf" hidden>Nombre de Carrera Profesional: </label>
                                <input hidden type="text" class="form-control" id="nCProfesional" name="nCProfesional" value="{{$dE->nCProfesional}}" style="margin-bottom: 5px;">

                                <label id="LDiplomados" hidden>Diplomados: </label>
                                <input hidden type="text" class="form-control" id="diplomados" name="diplomados" value="{{$dE->diplomados}}" style="margin-bottom: 5px;">

                                <label id="LCedula" hidden>No. de Cedula Profesional: </label>
                                <input hidden type="text" class="form-control" id="noCedula" name="noCedula" value="{{$dE->noCedula}}" style="margin-bottom: 5px;">
                                
                                <label id="LMaestrias" hidden>Maestrias: </label>
                                <textarea hidden type="text" class="form-control" id="Maestrias" name="Maestrias" style="margin-bottom: 5px;">{{$dE->Maestrias}}</textarea>

                                <label id="LCursosTra" hidden>Cursos recibidos enfocados a la actividad en el trabajo: </label>
                                <textarea hidden type="text" class="form-control" id="cursosExtra" name="cursosExtra" style="margin-bottom: 5px;">{{$dE->cursosExtra}}</textarea>

                                <label id="LAptitudes" hidden>Aptitudes como capacitador: </label>
                                <select class="custom-select" name="hCapacidades" id="hCapacidades" style="margin-bottom: 5px;" hidden>
                                        <option disabled>Elige una opción</option>
                                        <option value="SI">SI</option>
                                        <option value="NO">NO</option>
                                </select>

                                <label id="LDescripcion" hidden>Descripcion de aptitudes como capacitador: </label>
                                <textarea hidden type="text" class="form-control" id="habilidadesDesc" name="habilidadesDesc" style="margin-bottom: 5px;">{{$dE->habilidadesDesc}}</textarea>
    
                                <div>
                                <a class="btn btn-danger float-right" id="cancelInfoEscolar" onclick="cancelInfoEscolar()" hidden style="margin-top: 10px; margin-bottom: 10px; margin-left: 5px; color: white;">Cancelar</a>
                                <button type="submit" class="btn btn-asm float-right" id="updateInfoEscolar" hidden style="margin-top: 10px; margin-bottom: 10px;">Guardar</button>
                                </div>
                                <br>
                            </form>
                           
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-6">

            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true" onclick="editInfoLaboral()">Datos Laborales <i class="fas fa-pencil-alt" aria-hidden="true" style='font-size:24px'></i></a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        @foreach($dataLa as $dL)
                            <div><label id="MfIngreso">Fecha de Ingreso: {{$dL->fechaIngreso}}</label></div>
                            <div><label id="MNombramiento">Nombramiento: {{$dL->nombramiento}}</label></div>
                            <div><label id="MtypeTra">Tipo de Trabajador: {{$dL->tipoTrabajador }}</label></div>
                            <div><label id="MactLabAct">Actividades laborales actuales coinciden con su categoría: {{$dL->actActuales}}</label></div>
                            <div><label id="MactDescAct">Descripción de Actividades Actuales: {{$dL->actActualesDesc}}</label></div>
                            <div><label id="MresponAct">Responsabilidades actuales: {{$dL->responsabilidades}}</label></div>
                            <div><label id="MconPuesto">Conocimiento de Puesto: {{$dL->Puesto}}</label></div>
                            <div><label id="MdescPuesto">Descripción del puesto: {{$dL->descPuesto}}</label></div>
                            <div><label id="McursoASM">Recibió curso de inducción a la ASM: {{$dL->cursoInduccion}}</label></div>
                            <div><label id="MDescCursoASM">Descripción de curso de inducción a la ASM: {{$dL->cursoInduccionDesc}}</label></div>
                            <div><label id="McargosAnt">Cargos anteriores: {{$dL->cargosAnt}}</label></div>
                            <div><label id="MtrabajosAnt">Trabajos externos anteriores: {{$dL->trabajosExt}}</label></div>

                            <form id="infoLaboralUsuario">
                                {{ csrf_field() }}
                            <label id="LAct" hidden>Actividades laborales actuales coinciden con su categoría:</label>
                            <select class="custom-select" name="actActuales" id="actActuales" style="margin-bottom: 5px;" hidden>
                                    <option disabled>Elige una opción</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>

                            <label id="LDescAct" hidden>Descripción de Actividades Actuales: </label>
                            <textarea hidden type="text" class="form-control" id="actActualesDesc" name="actActualesDesc" style="margin-bottom: 5px;">{{$dL->actActualesDesc}}</textarea>

                            <label id="LRespon" hidden>Responsabilidades actuales: </label>
                            <textarea hidden type="text" class="form-control" id="responsabilidades" name="responsabilidades" style="margin-bottom: 5px;">{{$dL->responsabilidades}}</textarea>
 
                            <label id="LConPues" hidden>Conocimiento de Puesto:</label>
                            <select class="custom-select" name="Puesto" id="Puesto" style="margin-bottom: 5px;" hidden>
                                    <option disabled>Elige una opción</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>

                            <label id="LDesPuesto" hidden>Descripción del puesto: </label>
                            <textarea hidden type="text" class="form-control" id="descPuesto" name="descPuesto" style="margin-bottom: 5px;">{{$dL->descPuesto}}</textarea>
 
                            <label id="LResCurso" hidden>Recibió curso de inducción a la ASM: </label>
                            <select class="custom-select" name="cursoInduccion" id="cursoInduccion" style="margin-bottom: 5px;" hidden>
                                    <option disabled>Elige una opción</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                            </select>

                            <label id="LDesASM" hidden>Descripción de curso de inducción a la ASM: </label>
                            <textarea hidden type="text" class="form-control" id="cursoInduccionDesc" name="cursoInduccionDesc" style="margin-bottom: 5px;">{{$dL->cursoInduccionDesc}}</textarea>
 
                            <label id="LCargoAnt" hidden>Cargos anteriores: </label>
                            <textarea hidden type="text" class="form-control" id="cargosAnt" name="cargosAnt" style="margin-bottom: 5px;">{{$dL->cargosAnt}}</textarea>
 
                            <label id="LTAnte" hidden>Trabajos externos anteriores: </label>
                            <textarea hidden type="text" class="form-control" id="trabajosExt" name="trabajosExt"  style="margin-bottom: 5px;">{{$dL->trabajosExt}}</textarea>
 
                            <div>
                                <a class="btn btn-danger float-right" id="cancelInfoLaboral" onclick="cancelInfoLaboral()" hidden style="margin-top: 10px; margin-bottom: 10px; margin-left: 5px; color: white;">Cancelar</a>
                                <button type="submit" class="btn btn-asm float-right" id="updateInfoLaboral" hidden style="margin-top: 10px; margin-bottom: 10px;">Guardar</button>
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
                        <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true" onclick="editInfoMedicos()">Datos Medicos <i class="fas fa-pencil-alt" aria-hidden="true" style='font-size:24px'></i></a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                    @foreach($dataMe as $dM)
                        <div><label id="MtipoSangre">Tipo de Sangre: {{$dM->tipoSangre}}</label></div>
                        <div><label id="MnoImss">No. IMSS: {{$dM->noImss}}</label></div>
                        <div><label id="MpersonaEmerg">En caso de Emergencia llamar a: {{$dM->nombreEmergencia}}</label></div>
                        <div><label id="MtelEmerg">Teléfono de Emergencia: {{$dM->telEmergencia}}</label></div>
                        <div><label id="Mparentesco">Parentesco: {{$dM->parentesco}}</label></div>
                        <div><label id="Malergias">Alergias: {{$dM->alergias}}</label></div>
                        <div><label id="Menfermedades">Enfermedades: {{$dM->enfermedades}}</label></div>
                        <form id="datosMedicosUser">
                            {{ csrf_field() }}
                            <label id="LSangre" hidden>Tipo de Sangre: </label>
                            <select class="custom-select" name="tipoSangre" id="tipoSangre" style="margin-bottom: 5px;" hidden>
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
                            <input hidden type="text" class="form-control" id="noImss" name="noImss" value="{{$dM->noImss}}" style="margin-bottom: 5px;">

                            <label id="LPersonaEmerg" hidden>En caso de Emergencia Llamar a: </label>
                            <input hidden type="text" class="form-control" id="nombreEmergencia" name="nombreEmergencia" value="{{$dM->nombreEmergencia}}" style="margin-bottom: 5px;">

                            <label id="LTelefonoEmer" hidden>Teléfono de Emergencia</label>
                            <input hidden type="text" class="form-control" id="telEmergencia" name="telEmergencia" value="{{$dM->telEmergencia}}" style="margin-bottom: 5px;">

                            <label id="LParen" hidden>Parentesco</label>
                            <input hidden type="text" class="form-control" id="parentesco" name="parentesco" value="{{$dM->parentesco}}" style="margin-bottom: 5px;">

                            <label id="LAlergias" hidden>Alergias</label>
                            <textarea hidden type="text" class="form-control" id="alergias" name="alergias" style="margin-bottom: 5px;">{{$dM->alergias}}</textarea>

                            <label id="LEnfermedades" hidden>Enfermedades Cronicas: </label>
                            <textarea hidden type="text" class="form-control" id="enfermedades" name="enfermedades" style="margin-bottom: 5px;">{{$dM->enfermedades}}</textarea>

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

        </div>
    </div>
</div>
@endif

<script>
    //Edicion de Datos personales//
    function editInfo(){
        document.getElementById("updateInfo").removeAttribute("hidden");
        document.getElementById("cancelInfo").removeAttribute("hidden");

        document.getElementById("Mnombre").setAttribute("hidden", true);
        document.getElementById("Mcorreo").setAttribute("hidden",true);
        document.getElementById("Medad").setAttribute("hidden",true);
        document.getElementById("MedoCivil").setAttribute("hidden",true);
        document.getElementById("Mdireccion").setAttribute("hidden",true);
        document.getElementById("Mcelular").setAttribute("hidden",true);
        document.getElementById("MnHijos").setAttribute("hidden",true);
        document.getElementById("Msexo").setAttribute("hidden",true);
        document.getElementById("Mcurp").setAttribute("hidden",true);
        document.getElementById("Mrol").setAttribute("hidden",true);
        document.getElementById("Marea").setAttribute("hidden",true);

        document.getElementById("LName").removeAttribute("hidden");
        document.getElementById("name").removeAttribute("hidden");

        document.getElementById("LaPaterno").removeAttribute("hidden");
        document.getElementById("apPaterno").removeAttribute("hidden");

        document.getElementById("LaMaterno").removeAttribute("hidden");
        document.getElementById("apMaterno").removeAttribute("hidden");

        document.getElementById("LCorreo").removeAttribute("hidden");
        document.getElementById("email").removeAttribute("hidden");
        document.getElementById("LedoCivil").removeAttribute("hidden");
        document.getElementById("edoCivil").removeAttribute("hidden");
        document.getElementById("LEdad").removeAttribute("hidden");
        document.getElementById("edad").removeAttribute("hidden");


        document.getElementById("LCalle").removeAttribute("hidden");
        document.getElementById("calle").removeAttribute("hidden");
        document.getElementById("LNo").removeAttribute("hidden");
        document.getElementById("nCasa").removeAttribute("hidden");
        document.getElementById("LCol").removeAttribute("hidden");
        document.getElementById("colonia").removeAttribute("hidden");
        document.getElementById("LCel").removeAttribute("hidden");
        document.getElementById("telfono").removeAttribute("hidden");
        document.getElementById("LHijos").removeAttribute("hidden");
        document.getElementById("nHijos").removeAttribute("hidden");
  
    }

    function cancelInfo(){
        document.getElementById("updateInfo").setAttribute("hidden", true);
        document.getElementById("cancelInfo").setAttribute("hidden", true);

        document.getElementById("Mnombre").removeAttribute("hidden");
        document.getElementById("Medad").removeAttribute("hidden");
        document.getElementById("Mcorreo").removeAttribute("hidden");
        document.getElementById("MedoCivil").removeAttribute("hidden");
        document.getElementById("Mdireccion").removeAttribute("hidden");
        document.getElementById("Mcelular").removeAttribute("hidden");
        document.getElementById("MnHijos").removeAttribute("hidden");
        document.getElementById("Msexo").removeAttribute("hidden");
        document.getElementById("Mcurp").removeAttribute("hidden");
        document.getElementById("Mrol").removeAttribute("hidden");
        document.getElementById("Marea").removeAttribute("hidden");

        document.getElementById("LName").setAttribute("hidden", true);
        document.getElementById("name").setAttribute("hidden", true);
        document.getElementById("LaPaterno").setAttribute("hidden", true);
        document.getElementById("apPaterno").setAttribute("hidden", true);

        document.getElementById("LaMaterno").setAttribute("hidden", true);
        document.getElementById("apMaterno").setAttribute("hidden", true);

        document.getElementById("LCorreo").setAttribute("hidden", true);
        document.getElementById("email").setAttribute("hidden", true);
        document.getElementById("LedoCivil").setAttribute("hidden", true);
        document.getElementById("edoCivil").setAttribute("hidden", true);
        document.getElementById("LEdad").setAttribute("hidden", true);
        document.getElementById("edad").setAttribute("hidden", true);

        document.getElementById("LCalle").setAttribute("hidden", true);
        document.getElementById("calle").setAttribute("hidden", true);
        document.getElementById("LNo").setAttribute("hidden", true);
        document.getElementById("nCasa").setAttribute("hidden", true);
        document.getElementById("LCol").setAttribute("hidden", true);
        document.getElementById("colonia").setAttribute("hidden", true);
        document.getElementById("LCel").setAttribute("hidden", true);
        document.getElementById("telfono").setAttribute("hidden", true);
        document.getElementById("LHijos").setAttribute("hidden", true);
        document.getElementById("nHijos").setAttribute("hidden", true);
    }
    $('#datosPersonalesInfo').on('submit', function(e){
        var id = $('#id_User').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/editPersonal/"+id,
            dataType: "json",
            data: $('#datosPersonalesInfo').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
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
    });
    //Edicion de Datos Medicos
    function editInfoMedicos(){
        document.getElementById("updateInfoMedic").removeAttribute("hidden");
        document.getElementById("cancelInfoMedic").removeAttribute("hidden");

        document.getElementById("MtipoSangre").setAttribute("hidden", true);
        document.getElementById("MnoImss").setAttribute("hidden",true);
        document.getElementById("MpersonaEmerg").setAttribute("hidden",true);
        document.getElementById("MtelEmerg").setAttribute("hidden",true);
        document.getElementById("Mparentesco").setAttribute("hidden",true);
        document.getElementById("Malergias").setAttribute("hidden",true);
        document.getElementById("Menfermedades").setAttribute("hidden",true);

        document.getElementById("tipoSangre").removeAttribute("hidden");
        document.getElementById("LSangre").removeAttribute("hidden");
        document.getElementById("LNoImss").removeAttribute("hidden");
        document.getElementById("noImss").removeAttribute("hidden");
        document.getElementById("nombreEmergencia").removeAttribute("hidden");
        document.getElementById("telEmergencia").removeAttribute("hidden");
        document.getElementById("parentesco").removeAttribute("hidden");
        document.getElementById("alergias").removeAttribute("hidden");
        document.getElementById("enfermedades").removeAttribute("hidden");
        document.getElementById("LPersonaEmerg").removeAttribute("hidden");
        document.getElementById("LTelefonoEmer").removeAttribute("hidden");
        document.getElementById("LParen").removeAttribute("hidden");
        document.getElementById("LAlergias").removeAttribute("hidden");
        document.getElementById("LEnfermedades").removeAttribute("hidden");

    }

    function cancelInfoMedicos(){
        document.getElementById("updateInfoMedic").setAttribute("hidden", true);
        document.getElementById("cancelInfoMedic").setAttribute("hidden", true);

        document.getElementById("MtipoSangre").removeAttribute("hidden");
        document.getElementById("MnoImss").removeAttribute("hidden");
        document.getElementById("MpersonaEmerg").removeAttribute("hidden");
        document.getElementById("MtelEmerg").removeAttribute("hidden");
        document.getElementById("Mparentesco").removeAttribute("hidden");
        document.getElementById("Malergias").removeAttribute("hidden");
        document.getElementById("Menfermedades").removeAttribute("hidden");

        document.getElementById("tipoSangre").setAttribute("hidden", true);
        document.getElementById("LSangre").setAttribute("hidden", true);
        document.getElementById("LNoImss").setAttribute("hidden", true);
        document.getElementById("noImss").setAttribute("hidden", true);
        document.getElementById("nombreEmergencia").setAttribute("hidden", true);
        document.getElementById("telEmergencia").setAttribute("hidden", true);
        document.getElementById("parentesco").setAttribute("hidden", true);
        document.getElementById("alergias").setAttribute("hidden", true);
        document.getElementById("enfermedades").setAttribute("hidden", true);
        document.getElementById("LPersonaEmerg").setAttribute("hidden", true);
        document.getElementById("LTelefonoEmer").setAttribute("hidden", true);
        document.getElementById("LParen").setAttribute("hidden", true);
        document.getElementById("LAlergias").setAttribute("hidden", true);
        document.getElementById("LEnfermedades").setAttribute("hidden", true);

    }
    $('#datosMedicosUser').on('submit', function(e){
        var id = $('#id_User').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/editMedic/"+id,
            dataType: "json",
            data: $('#datosMedicosUser').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
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
    });
    //Editar los datos Escolares
    function editInfoEscolar(){
        document.getElementById("updateInfoEscolar").removeAttribute("hidden");
        document.getElementById("cancelInfoEscolar").removeAttribute("hidden");

        document.getElementById("Mprimaria").setAttribute("hidden", true);
        document.getElementById("Msecundaria").setAttribute("hidden",true);
        document.getElementById("Mprepa").setAttribute("hidden",true);
        document.getElementById("McTecnica").setAttribute("hidden",true);
        document.getElementById("McProfesional").setAttribute("hidden",true);
        document.getElementById("MnTec").setAttribute("hidden",true);
        document.getElementById("MnCProf").setAttribute("hidden",true);
        document.getElementById("MDiplomados").setAttribute("hidden",true);
        document.getElementById("MNoCedula").setAttribute("hidden",true);
        document.getElementById("MMaestrias").setAttribute("hidden",true);
        document.getElementById("MCursosTrabajo").setAttribute("hidden",true);
        document.getElementById("MaptitudesCapa").setAttribute("hidden",true);
        document.getElementById("MDescApt").setAttribute("hidden",true);

        document.getElementById("LPrimaria").removeAttribute("hidden");
        document.getElementById("Primaria").removeAttribute("hidden");
        document.getElementById("LSecu").removeAttribute("hidden");
        document.getElementById("Secundaria").removeAttribute("hidden");
        document.getElementById("LPrepa").removeAttribute("hidden");
        document.getElementById("Prepa").removeAttribute("hidden");
        document.getElementById("LTecnica").removeAttribute("hidden");
        document.getElementById("cTecnica").removeAttribute("hidden");
        document.getElementById("LProfe").removeAttribute("hidden");
        document.getElementById("cProfesional").removeAttribute("hidden");
        document.getElementById("LNCarreraTec").removeAttribute("hidden");
        document.getElementById("LNCarreraProf").removeAttribute("hidden");
        document.getElementById("nCTecnica").removeAttribute("hidden");
        document.getElementById("nCProfesional").removeAttribute("hidden");
        document.getElementById("LDiplomados").removeAttribute("hidden");
        document.getElementById("diplomados").removeAttribute("hidden");
        document.getElementById("LCedula").removeAttribute("hidden");
        document.getElementById("noCedula").removeAttribute("hidden");
        document.getElementById("LMaestrias").removeAttribute("hidden");
        document.getElementById("Maestrias").removeAttribute("hidden");
        document.getElementById("LCursosTra").removeAttribute("hidden");
        document.getElementById("cursosExtra").removeAttribute("hidden");
        document.getElementById("LAptitudes").removeAttribute("hidden");
        document.getElementById("hCapacidades").removeAttribute("hidden");
        document.getElementById("LDescripcion").removeAttribute("hidden");
        document.getElementById("habilidadesDesc").removeAttribute("hidden");


        

    }
    function cancelInfoEscolar(){
        document.getElementById("updateInfoEscolar").setAttribute("hidden",true);
        document.getElementById("cancelInfoEscolar").setAttribute("hidden",true);

        document.getElementById("Mprimaria").removeAttribute("hidden");
        document.getElementById("Msecundaria").removeAttribute("hidden");
        document.getElementById("Mprepa").removeAttribute("hidden");
        document.getElementById("McTecnica").removeAttribute("hidden");
        document.getElementById("McProfesional").removeAttribute("hidden");
        document.getElementById("MnTec").removeAttribute("hidden");
        document.getElementById("MnCProf").removeAttribute("hidden");
        document.getElementById("MDiplomados").removeAttribute("hidden");
        document.getElementById("MNoCedula").removeAttribute("hidden");
        document.getElementById("MMaestrias").removeAttribute("hidden");
        document.getElementById("MCursosTrabajo").removeAttribute("hidden");
        document.getElementById("MaptitudesCapa").removeAttribute("hidden");
        document.getElementById("MDescApt").removeAttribute("hidden");

        document.getElementById("LPrimaria").setAttribute("hidden",true);
        document.getElementById("Primaria").setAttribute("hidden",true);
        document.getElementById("LSecu").setAttribute("hidden",true);
        document.getElementById("Secundaria").setAttribute("hidden",true);
        document.getElementById("LPrepa").setAttribute("hidden",true);
        document.getElementById("Prepa").setAttribute("hidden",true);
        document.getElementById("LTecnica").setAttribute("hidden",true);
        document.getElementById("cTecnica").setAttribute("hidden",true);
        document.getElementById("LProfe").setAttribute("hidden",true);
        document.getElementById("cProfesional").setAttribute("hidden",true);
        document.getElementById("LNCarreraTec").setAttribute("hidden",true);
        document.getElementById("LNCarreraProf").setAttribute("hidden",true);
        document.getElementById("nCTecnica").setAttribute("hidden",true);
        document.getElementById("nCProfesional").setAttribute("hidden",true);
        document.getElementById("LDiplomados").setAttribute("hidden",true);
        document.getElementById("diplomados").setAttribute("hidden",true);
        document.getElementById("LCedula").setAttribute("hidden",true);
        document.getElementById("noCedula").setAttribute("hidden",true);
        document.getElementById("LMaestrias").setAttribute("hidden",true);
        document.getElementById("Maestrias").setAttribute("hidden",true);
        document.getElementById("LCursosTra").setAttribute("hidden",true);
        document.getElementById("cursosExtra").setAttribute("hidden",true);
        document.getElementById("LAptitudes").setAttribute("hidden",true);
        document.getElementById("hCapacidades").setAttribute("hidden",true);
        document.getElementById("LDescripcion").setAttribute("hidden",true);
        document.getElementById("habilidadesDesc").setAttribute("hidden",true);

    }
    $('#infoEscolar').on('submit', function(e){
        var id = $('#id_User').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/editSchool/"+id,
            dataType: "json",
            data: $('#infoEscolar').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
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
    });
    //Editar los Datos Laborales
    function editInfoLaboral(){
        document.getElementById("updateInfoLaboral").removeAttribute("hidden");
        document.getElementById("cancelInfoLaboral").removeAttribute("hidden");

        document.getElementById("MactLabAct").setAttribute("hidden", true);
        document.getElementById("MactDescAct").setAttribute("hidden",true);
        document.getElementById("MresponAct").setAttribute("hidden",true);
        document.getElementById("MconPuesto").setAttribute("hidden",true);
        document.getElementById("MdescPuesto").setAttribute("hidden",true);
        document.getElementById("McursoASM").setAttribute("hidden",true);
        document.getElementById("MDescCursoASM").setAttribute("hidden",true);
        document.getElementById("McargosAnt").setAttribute("hidden",true);
        document.getElementById("MtrabajosAnt").setAttribute("hidden",true);

        document.getElementById("LAct").removeAttribute("hidden");
        document.getElementById("actActuales").removeAttribute("hidden");
        document.getElementById("LDescAct").removeAttribute("hidden");
        document.getElementById("actActualesDesc").removeAttribute("hidden");
        document.getElementById("LRespon").removeAttribute("hidden");
        document.getElementById("responsabilidades").removeAttribute("hidden");
        document.getElementById("LConPues").removeAttribute("hidden");
        document.getElementById("Puesto").removeAttribute("hidden");
        document.getElementById("LDesPuesto").removeAttribute("hidden");
        document.getElementById("descPuesto").removeAttribute("hidden");
        document.getElementById("LResCurso").removeAttribute("hidden");
        document.getElementById("cursoInduccion").removeAttribute("hidden");
        document.getElementById("LDesASM").removeAttribute("hidden");
        document.getElementById("cursoInduccionDesc").removeAttribute("hidden");
        document.getElementById("LCargoAnt").removeAttribute("hidden");
        document.getElementById("cargosAnt").removeAttribute("hidden");
        document.getElementById("LTAnte").removeAttribute("hidden");
        document.getElementById("trabajosExt").removeAttribute("hidden");
        

    }
    function cancelInfoLaboral(){
        document.getElementById("updateInfoLaboral").setAttribute("hidden", true);
        document.getElementById("cancelInfoLaboral").setAttribute("hidden", true);

        document.getElementById("MactLabAct").removeAttribute("hidden");
        document.getElementById("MactDescAct").removeAttribute("hidden");
        document.getElementById("MresponAct").removeAttribute("hidden");
        document.getElementById("MconPuesto").removeAttribute("hidden");
        document.getElementById("MdescPuesto").removeAttribute("hidden");
        document.getElementById("McursoASM").removeAttribute("hidden");
        document.getElementById("MDescCursoASM").removeAttribute("hidden");
        document.getElementById("McargosAnt").removeAttribute("hidden");
        document.getElementById("MtrabajosAnt").removeAttribute("hidden");

        document.getElementById("LAct").setAttribute("hidden", true);
        document.getElementById("actActuales").setAttribute("hidden", true);
        document.getElementById("LDescAct").setAttribute("hidden", true);
        document.getElementById("actActualesDesc").setAttribute("hidden", true);
        document.getElementById("LRespon").setAttribute("hidden", true);
        document.getElementById("responsabilidades").setAttribute("hidden", true);
        document.getElementById("LConPues").setAttribute("hidden", true);
        document.getElementById("Puesto").setAttribute("hidden", true);
        document.getElementById("LDesPuesto").setAttribute("hidden", true);
        document.getElementById("descPuesto").setAttribute("hidden", true);
        document.getElementById("LResCurso").setAttribute("hidden", true);
        document.getElementById("cursoInduccion").setAttribute("hidden", true);
        document.getElementById("LDesASM").setAttribute("hidden", true);
        document.getElementById("cursoInduccionDesc").setAttribute("hidden", true);
        document.getElementById("LCargoAnt").setAttribute("hidden", true);
        document.getElementById("cargosAnt").setAttribute("hidden", true);
        document.getElementById("LTAnte").setAttribute("hidden", true);
        document.getElementById("trabajosExt").setAttribute("hidden", true);

    }
    $('#infoLaboralUsuario').on('submit', function(e){
        var id = $('#id_User').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/editLaboral/"+id,
            dataType: "json",
            data: $('#infoLaboralUsuario').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
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
    });
</script>
@endsection

                                        