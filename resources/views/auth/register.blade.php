<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ASM Cursos</title>

    <!-- FONT -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Rubik:400,500,800">

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- ALERTAS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <div class="contenedor-fluid">
        <header>
            <nav class="navegacion row">
                <img src="../img/header_.png" width="100%" alt="header">
            </nav>
        </header>
    </div>
    <div class="text-center align-middle" style="background-color: rgb(40, 146, 157); height: 50px;">
    <br>
    <h1 class="text-light align-middle">INFORMACIÓN PERSONAL DE LA AUDITORÍA SUPERIOR DE MICHOACÁN</h1>
    <br>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs">

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <form  method="POST" action="" enctype="multipart/form-data">
                            <h3 class="text-center">DATOS PERSONALES</h3>
                            <hr> 
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Apellido Paterno</label>
                                    </div>
                                    <input type="text" class="form-control" id="aPaterno" name="aPaterno" placeholder="Apellido Paterno" onkeypress="return soloLetras(event)" required>
                                </div>
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Apellido Materno</label>
                                        <input type="text" class="form-control" id="aMaterno" name="aMaterno" placeholder="Apellido Materno" onkeypress="return soloLetras(event)" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombre(s)</label>
                                        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombre" onkeypress="return soloLetras(event)" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row align-self-center">
                                <div class="form-group col-lg-1" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Edad</label>
                                    </div>
                                    <input type="number"  class="form-control" id="edad" name="edad" placeholder="" min="0" max="100" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Sexo</label>
                                    </div>
                                    <div class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="Masculino">
                                        <label class="form-check-label" for="Masculino">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="Femenino" value="Femenino">
                                        <label class="form-check-label" for="Femenino">Femenino</label>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Estado Civil</label>
                                    </div>
                                    <select class="custom-select">
                                    <option selected>Casado</option>
                                    <option value="1">Soltero</option>
                                    <option value="2">Divorciado</option>
                                    <option value="3">Separación en proceso Judicial</option>
                                    <option value="4">Viudo</option>
                                    <option value="5">Concubinato</option>
                                    </select>
                                </div>

                                <div class="form-group col-lg-2" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Calle</label>
                                    </div>
                                    <input type="text"  class="form-control" id="calle" name="calle" placeholder="Calle" required>
                                </div>
                                <div class="form-group col-lg-2" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Colonia - Fraccionamiento</label>
                                    </div>
                                    <input type="text"  class="form-control" id="Colonia" name="Colonia" placeholder="Colonia" required>
                                </div>
                                <div class="form-group col-lg-1" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>No.</label>
                                    </div>
                                    <input type="text" class="form-control" id="numeroCasa" name="numeroCasa" placeholder="#" required>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Telefóno celular</label>
                                    </div>
                                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono Celular" maxlength="10" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Correo Electrónico</label>
                                    </div>
                                    <input type="text" class="form-control" id="correo" name="correo" placeholder="correo electrónico" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>CURP</label>
                                    </div>
                                    <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" pattern="([A-Z][AEIOUX][A-Z]{2}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Num. de Hijos</label>
                                    </div>
                                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Número de Hijos" maxlength="10" required>
                                </div>
                            </div>
                            
                            <br>
                            <h3 class="text-center">DATOS MÉDICOS</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-2" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Tipo de sangre</label>
                                    </div>
                                    <input type="text" class="form-control" id="tipoSangre" name="tipoSangre" placeholder="Tipo de Sangre" required>
                                </div>
                                
                                <div class="form-group col-lg-2" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>No. IMSS</label>
                                    </div>
                                    <input type="text" class="form-control" id="numImss" name="numImss" placeholder="No. IMSS" required>
                                </div>
                                
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>En caso de emergencia llamar a</label>
                                    </div>
                                    <input type="text" class="form-control" id="nombreEmergencia" name="nombreEmergencia" placeholder="Nombre Completo" onkeypress="return soloLetras(event)" required>
                                </div>
                                <div class="form-group col-lg-2" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Telefóno de emergencia</label>
                                    </div>
                                    <input type="text" class="form-control" id="telefonoEmergencia" name="telefonoEmergencia" placeholder="Teléfono de Emergencia" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Parentesco</label>
                                    </div>
                                    <input type="text" class="form-control" id="parentesco" name="parentesco" placeholder="Ej. Esposo etc. " required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Alergias</label>
                                    </div>
                                    <textarea class="form-control" id="alergias" name="alergias" placeholder="Alergias"></textarea>
                                </div>
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                <div class="text-center">
                                    <label>Enfermedades Crónicas</label>
                                </div>
                                <textarea class="form-control" id="enfermedades" name="enfermedades" placeholder="Enfermedades Crónicas"></textarea>
                            </div>

                            </div>
                            <br>
                            <h3 class="text-center">DATOS ESCOLARES</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 20% 0 20%">
                                <table class="table table-striped text-center border">
                                    <thead>
                                        <tr>
                                        <th scope="col">Escolaridad</th>
                                        <th scope="col">CUENTAS CON CERTIFICADO O DOCUMENTO QUE AVALE EL ESTUDIO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Primaria</td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="primaria" id="SI" value="SI">
                                                        <label class="form-check-label" for="SI">SI</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="primaria" id="NO" value="NO">
                                                        <label class="form-check-label" for="NO">NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Secundaria</td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="secundaria" id="SI" value="SI">
                                                        <label class="form-check-label" for="SI">SI</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="secundaria" id="NO" value="NO">
                                                        <label class="form-check-label" for="NO">NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Preparatoria</td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="prepa" id="SI" value="SI">
                                                        <label class="form-check-label" for="SI">SI</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="prepa" id="NO" value="NO">
                                                        <label class="form-check-label" for="NO">NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Carrera Técnica</td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="carreraTecnica" id="SI" value="SI">
                                                        <label class="form-check-label" for="SI">SI</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="carreraTecnica" id="NO" value="NO">
                                                        <label class="form-check-label" for="NO">NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Carrera Profesional</td>
                                            <td>
                                                <div class="text-center">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="carreraProf" id="SI" value="SI">
                                                        <label class="form-check-label" for="SI">SI</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="carreraProf" id="NO" value="NO">
                                                        <label class="form-check-label" for="NO">NO</label>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>
                                    
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombre de Carrera Técnica</label>
                                    </div>
                                    <input type="text" class="form-control" id="carreraTecnica" name="carreraTecnica" placeholder="Nombre de Carrera Técnica">
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombre de Carrera Profesional</label>
                                    </div>
                                    <input type="text" class="form-control" id="carreraProfesional" name="carreraProfesional" placeholder="Nombre de Carrera Profesional">
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Diplomados</label>
                                    </div>
                                    <input type="text" class="form-control" id="diplomado" name="diplomado" placeholder="Diplomados">
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>No. De Cédula Profesional:</label>
                                    </div>
                                    <input type="text" class="form-control" id="cedula" name="cedula" placeholder="No. De Cédula Profesional">
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombre de Maestrías o Doctorados</label>
                                    </div>
                                    <textarea class="form-control" id="maestriasDoc" name="maestriasDoc" placeholder=""></textarea>
                                </div>
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Otros Cursos recibidos enfocados a tu actividad en el trabajo</label>
                                    </div>
                                    <textarea class="form-control" id="otrosCursos" name="otrosCursos" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>¿Consideras que tienes aptitudes como capacitador? Especifícalas</label>
                                        <div class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="capacidades" id="capa1" value="SI">
                                        <label class="form-check-label" for="SI">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="capacidades" id="capa2" value="NO">
                                        <label class="form-check-label" for="NO">NO</label>
                                    </div>
                                    </div>

                                    </div>
                                    <textarea class="form-control" id="maestriasDoc" name="maestriasDoc" placeholder=""></textarea>
                                </div>
                            </div>
                            <br>
                            <h3 class="text-center">DATOS LABORALES</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Fecha de Ingreso</label>
                                    </div>
                                    <input type="date" class="form-control" id="fechaIngreso" name="fechaIngreso" placeholder="" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Cargo Actual</label>
                                    </div>
                                   <select class="custom-select">
                                       <option value="3">Auditor Auxiliar</option>
                                       <option value="4">Jefe</option>
                                       <option value="5">Director</option>
                                   </select>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombramiento</label>
                                    </div>
                                    <input type="text" class="form-control" id="Nombramiento" name="Nombramiento" placeholder="Nombramiento" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Área de Trabajo</label>
                                    </div>
                                    <select class="custom-select">
                                        <option disabled>Elige una área</option>
                                        <option value="1">Despacho del Auditor Superior</option>
                                        <option value="2">Normatividad</option>
                                        <option value="3">Especial Estatal</option>
                                        <option value="4">Especial Municipal</option>
                                        <option value="5">Planeación</option>
                                        <option value="6">Investigación</option>
                                        <option value="7">Substanciación</option>
                                        <option value="8">Unidad Gral de Asuntos Jurídicos</option>
                                        <option value="9">Dirección administrativa</option>
                                    </select>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                        <div class="text-center">
                                            <label>Tipo de Trabajador</label>
                                        </div>
                                        <select class="custom-select">
                                            <option disabled>Elige una opción</option>
                                            <option value="Base">Base</option>
                                            <option value="Confianza">Confianza</option>
                                            <option value="Sindicalizado">Sindicalizado</option>
                                        </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>¿Sus actividades laborales actuales coinciden con su categoría?. Especifíque: </label>
                                        <div class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="datosL1" id="L1" value="SI">
                                        <label class="form-check-label" for="SI">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="datosL1" id="L2" value="NO">
                                        <label class="form-check-label" for="NO">NO</label>
                                    </div>
                                    </div>

                                    </div>
                                    <textarea class="form-control" id="actLaborales" name="actLaborales" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Describe de responsabilidades actuales:</label>
                                    </div>
                                    <textarea class="form-control" id="responsabilidades" name="responsabilidades" placeholder="" required></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>¿Conoces la descripción de tu puesto? Explica</label>
                                        <div class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="datosL2" id="L2" value="SI">
                                        <label class="form-check-label" for="SI">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="datosL2" id="L2" value="NO">
                                        <label class="form-check-label" for="NO">NO</label>
                                    </div>
                                    </div>

                                    </div>
                                    <textarea class="form-control" id="descPuesto" name="descPuesto" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>¿Recibiste curso de inducción a la ASM y a tu puesto? Explica</label>
                                        <div class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="datosL3" id="L3" value="SI">
                                        <label class="form-check-label" for="SI">SI</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="datosL3" id="L3" value="NO">
                                        <label class="form-check-label" for="NO">NO</label>
                                    </div>
                                    </div>

                                    </div>
                                    <textarea class="form-control" id="confiCurso" name="confiCurso" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Cargos anteriores:</label>
                                    </div>
                                    <textarea class="form-control" id="cargosAnteriores" name="cargosAnteriores" placeholder=""></textarea>
                                </div>
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Trabajos externos anteriores:</label>
                                    </div>
                                    <textarea class="form-control" id="trabajosAnteriores" name="trabajosAnteriores" placeholder=""></textarea>
                                </div>
                            </div>
                           
                            <br>
                            
                            <hr>

                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <button type="submit" name="submit" class="btn btn-asm btn-block">REGISTRARSE</button>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>

                        
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
    
</body>
</html>

<!--Script para solo letras en el nombre-->
<script>
     function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];
        tecla_especial = false
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
     }
</script>