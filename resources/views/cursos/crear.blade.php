@extends('layouts.menu')
@section('content')
<style>
.hide{
  display:none;
}
</style>
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
                        <form  method="POST" action=" {{ route('cursos.store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-lg-7" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombre del Curso</label>
                                    </div>
                                    <input type="text" class="form-control" id="NombreCurso" name="nombreCurso" placeholder="Nombre del Curso" required>
                                </div>
                                <div class="form-group col-lg-5" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Modalidad</label>
                                    </div>
                                        <select class="custom-select" name="modalidad" required>
                                            @foreach($modalidades as $modalidad)
                                                <option value="{!! $modalidad->id !!}">{!! $modalidad->nombre !!}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Lugar</label>
                                    </div>
                                    <input type="text"  class="form-control" id="lugar" name="lugar" placeholder="Lugar donde se impartira el curso">
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Fecha Inicio</label>
                                    </div>
                                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
                                </div>
                                
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Fecha Fin</label>
                                    </div>
                                    <input type="date" class="form-control" id="fechaFin" name="fechaFin">
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-left">
                                        <label>Descripción del curso</label>
                                    </div>
                                    <textarea class="form-control" id="descripcionCurso" name="descripcionCurso" rows="3" placeholder="Descripción breve de curso"></textarea>
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
                                    <input type="time" class="form-control" id="horaInicio" name="horaInicio" placeholder="Nombre del Curso">
                                </div>
                                
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Hora de salida</label>
                                    </div>
                                    <input type="time" class="form-control" id="horaFin" name="horaFin">
                                </div>
                                
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Horas Totales</label>
                                    </div>
                                    <input type="number" class="form-control" id="horasTotales" name="horasTotales" placeholder="Horas Totales">
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
                                    <input type="text" class="form-control" id="namePonente" name="nombrePonente" placeholder="Nombre completo del ponente">
                                </div>
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <div class="text-left">
                                        <label>Información del Ponente</label>
                                    </div>
                                    <textarea class="form-control" id="infoPonente" rows="3" name="infoPonente" placeholder="Información, curriculum del ponente"></textarea>
                                </div>
                            </div>
                            <br>
                            <h3>Imagen del Curso</h3>
                            <hr>
                            <div class="form-row">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <label>Imagen del curso</label><br>
                                    <input type="file" name="imagenCurso">
                                </div>
                            </div>
                            <br>
                            <h3>Áreas Invitadas</h3>
                            <hr>

                            <div class="form-row">
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                @foreach($areas as $area)
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="area_{!! $area->id !!}" name="area[]" onclick="showInput(this)" value="{!! $area->id !!}">
                                        <label class="form-check-label" for="defaultCheck1">
                                            {!! $area->nombre !!}
                                        </label>
                                    </div>
                                    
                                    <div class="form-group col-lg-6">
                                        <input placeholder="Cupo" style="display: none;" type="number" class="form-control form-control-sm" id="cupo_{!! $area->id !!}" name="cupo[]" min=1>
                                    </div>

                                @endforeach
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <!--<div class="text-left">
                                        <label>Número de áreas a invitar</label>
                                    </div>-->
                                    <!--<input class="form-control" type="number" name="numero" id="numero" value="">-->
                                </div>
                                <div class="form-group col-lg-8" style="padding: 0 2% 0 2%">
                                    <div id="demo" style="padding: 1% 0 0 0;"></div>
                                </div>
                            </div>

                                <script type="text/javascript">
                                    function showInput(checkbox) {
                                        var numero = checkbox.id;
                                        var num = numero.split("_");
                                        
                                        if($(checkbox).prop('checked')) {
                                            $('#cupo_'+num[1]).css('display','block');
                                        } else {
                                            $('#cupo_'+num[1]).css('display','none');
                                            $('#cupo_'+num[1]).val("")
                                        }
                                    }
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
                                    <button type="submit" name="submit" class="btn btn-asm btn-block">Crear Curso</button>
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