@extends('layouts.menu')
@section('content')
<div class="mx-auto">
<div class="col-lg-12 col-md-11 col-sm-11 col-xs-11">
        <div class="z-depth-5 card col-md-11">
            <div class="card-body">
                <h1>Información de Curso</h1>
                <form>
                <div class="form-group">
                    <input type="text" class="form-control" id="NombreCuros" placeholder="Nombre del Curso">
                </div>
                <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                        <label>Inicio: </label>
                        <input type="date" id="fechaInicio" placeholder="Fecha de Inicio">
                        </div>
                        <div class="col text-center">
                        <label>Terminación: </label>
                        <input type="date" id="fechaTermino" placeholder="Fecha de Termino">
                        </div>
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <div class="row">
                            <div class="col text-left">
                                <label>Hora de Inicio</label>
                                <input type="time" id="fechaInicio" placeholder="Fecha de Inicio">
                                </div>
                            <div class="col text-left">
                                <label>Hora de Termino</label>
                                <input type="time" id="fechaInicio" placeholder="Fecha de Inicio">
                            </div>
                            <div class="col text-center">
                                <input type="number" class="form-control" id="horasTotales" placeholder="Horas Totales">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                <div class="container">
                    <div class="row">
                        <div class="col">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="ponente">Nombre Completo del Ponente</label>
                        <input type="text" class="form-control" id="namePonente" placeholder="Ponente">
                        </div>
                        </div>
                        <div class="col">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <label for="ponente">Información del Ponente</label>
                        <input type="text" class="form-control" id="namePonente" placeholder="Información">
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="lugar">Lugar</label>
                            <input type="text"  class="form-control" id="lugar" placeholder="Lugar donde se impartira el curso">
                            </div>
                            </div>
                            <div class="col text-center">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <label for="lugar">Modalidad</label>
                            <select class="custom-select">
                                <option value=""disabled selected>Elige una Opcion</option>
                                <option value="1">Presencial</option>
                                <option value="2">En linea</option>
                            </select>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text"  class="form-control" id="descripcionCurso" placeholder="Descripcion breve de curso">
                </div>
                <h3>Áreas Invitadas</h3>
                <div class="form-group">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <br>
                    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function(){
                            $("#areasAceptadas").click(function () {
                            var numeroAreas = parseInt( $("#numero").val());
                            var text = "";
                            var i;
                            for (i = 0; i <numeroAreas; i++) {
                              text +=
                             "<br><div class='container'><div class='row text-left'><div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 input-field'><select class='custom-select'><option value='' disabled selected>Elige el área</option><option value='1'>1. Despacho del auditor Superior</option><option value='2'>2. Normatividad</option><option value='3'>3. Especial Estatal</option><option value='4'>4. Especial Municipal</option><option value='5'>5. Planeacion</option><option value='6'>6. Investigacion</option><option value='7'>7. Substanciacion</option><option value='8'>8. Unidad Gral. de Asuntos Jurídicos</option><option value='9'>9. Direccion Administrativa</option></select></div><div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 input-field'><input type='number' name='CupoArea' id='cupo' class='cupo' value='' placeholder='Cupo'></div></div></div><br>";
                            }
                            document.getElementById("demo").innerHTML = text;
                            });
                        });
                    </script>
                    <div class="container">
                        <div class="row">
                        <input type="number" name="numero" id="numero" class="numero" value="">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <button class="btn btn-success" type="button" name="areasAceptadas" id="areasAceptadas" value="Aceptar">Aceptar</button>
                        </div>
                        </div>
                    </div>
                    <div id="demo"></div>
                    </div>
                    
                </div>
                <button type="button" class="btn btn-success btn-lg float-right">Crear Curso</button>
                </form>
            </div>
            </div>
    </div>
    </div>
@endsection