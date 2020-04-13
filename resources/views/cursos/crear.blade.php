@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="users-tab" data-toggle="tab" role="tab" aria-controls="users" aria-selected="true">Crear Nuevo Curso</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">

                        <h3>Información de Curso</h3>
                        <hr>
                        <form>
                            
                            <div class="form-row">
                                <div class="form-group col-lg-7" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombre del Curso</label>
                                    </div>
                                    <input type="text" class="form-control" id="NombreCuros" placeholder="Nombre del Curso">
                                </div>
                                <div class="form-group col-lg-5" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Modalidad</label>
                                    </div>
                                        <select class="custom-select">
                                            <option value=""disabled selected>Elige una Opcion</option>
                                            <option value="1">Presencial</option>
                                            <option value="2">En linea</option>
                                        </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Lugar</label>
                                    </div>
                                    <input type="text"  class="form-control" id="lugar" placeholder="Lugar donde se impartira el curso">
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Fecha Inicio</label>
                                    </div>
                                    <input type="date" class="form-control" id="fechaInicio">
                                </div>
                                
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Fecha Fin</label>
                                    </div>
                                    <input type="date" class="form-control" id="fechaFin">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-left">
                                        <label>Descripción del curso</label>
                                    </div>
                                    <textarea class="form-control" id="descripcionCurso" rows="3" placeholder="Descripción breve de curso"></textarea>
                                </div>
                            </div>
                            
                            <br>
                            <h3>Horario</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Hora de entrada</label>
                                    </div>
                                    <input type="time" class="form-control" id="horaInicio" placeholder="Nombre del Curso">
                                </div>
                                
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Hora de salida</label>
                                    </div>
                                    <input type="time" class="form-control" id="horaFin">
                                </div>
                                
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Horas Totales</label>
                                    </div>
                                    <input type="number" class="form-control" id="horasTotales" placeholder="Horas Totales">
                                </div>
                            </div>
                            
                            <br>
                            <h3>Información del ponente</h3>
                            <hr>

                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-left">
                                        <label>Nombre del Ponente</label>
                                    </div>
                                    <input type="text" class="form-control" id="namePonente" placeholder="Nombre completo del ponente">
                                </div>
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-left">
                                        <label>Información del Ponente</label>
                                    </div>
                                    <input type="time" class="form-control" id="horaFin">
                                </div>
                            </div>

                            <br>
                            <h3>Áreas Invitadas</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-left">
                                        <label>Número de áreas a invitar</label>
                                    </div>
                                    <input class="form-control" type="number" name="numero" id="numero" value="">
                                </div>
                                <div class="form-group col-lg-8" style="padding: 0 2% 0 2%">
                                    <div id="demo" style="padding: 1% 0 0 0;"></div>
                                </div>
                            </div>

                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $("#numero").change(function () {
                                        var numeroAreas = parseInt( $("#numero").val());
                                        var text = "";
                                        var i;
                                        for (i = 0; i <numeroAreas; i++) {
                                        text +=
                                            "<br>"+
                                            "<div class='row text-left'>"+
                                                "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 input-field'>"+
                                                    "<select class='custom-select'>"+
                                                        "<option value='' disabled selected>Elige el área</option>"+
                                                        "<option value='1'>1. Despacho del auditor Superior</option>"+
                                                        "<option value='2'>2. Normatividad</option>"+
                                                        "<option value='3'>3. Especial Estatal</option>"+
                                                        "<option value='4'>4. Especial Municipal</option>"+
                                                        "<option value='5'>5. Planeacion</option>"+
                                                        "<option value='6'>6. Investigacion</option>"+
                                                        "<option value='7'>7. Substanciacion</option>"+
                                                        "<option value='8'>8. Unidad Gral. de Asuntos Jurídicos</option>"+
                                                        "<option value='9'>9. Direccion Administrativa</option>"+
                                                    "</select>"+
                                                "</div>"+
                                                "<div class='col-lg-6 col-md-6 col-sm-6 col-xs-6 input-field'>"+
                                                    "<input type='number' name='CupoArea' id='cupo' class='form-control' value='' placeholder='Cupo'>"+
                                                "</div>"+
                                            "</div>";
                                        }
                                        document.getElementById("demo").innerHTML = text;
                                        });
                                    });
                                </script>

                            <br>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-asm btn-block">Crear Curso</button>
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
@endsection