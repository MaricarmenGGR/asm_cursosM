@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <br>
            <div class="text-center">
                    <h1>
                        <p class="d-inline" id="pNombre" style="font-size: 27px;">{!! $curso->nombreCurso !!} </p>
                        <a class="btn d-inline" id="editNombre" onclick="editNombre()"><i class="fas fa-pencil-alt"></a></i>
                    </h1>

                <div class="row">
                    <div class="col-lg-4"></div>
                    <form id="nombreForm" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" class="form-control" id="nombreCurso" name="nombreCurso" value="{{$curso->nombreCurso}}" placeholder="Nombre del curso" hidden>
                        </div>
                        <button id="updateNombre" type="submit" class="btn btn-asm mb-2" hidden>Guardar</button>
                        <a id="cancelNombre" class="btn btn-secondary mb-2" style="margin-left: 5px; color: white;" hidden onclick="cancelNombre()">Cancelar</a>
                    </form>
                </div>

                <input id="idCurso" type="number" hidden value="{{ $curso->id }}">
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs" style="margin-top: 1%;">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link" id="info-tab" href="/cursos/{{$curso->id}}">Información General</a>
                            <a class="nav-item nav-link" id="programa-tab" href="/{{$curso->id}}/programa">Programa</a>
                            <a class="nav-item nav-link" id="materiales-tab" href="/{{$curso->id}}/material">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" href="/{{$curso->id}}/evaluacion">Evaluación</a>
                            <a class="nav-item nav-link" id="asistencia-tab" href="/{{$curso->id}}/asistencia" >Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" href="/{{$curso->id}}/invitacion">Invitación</a>
                            <a class="nav-item nav-link active" id="resultadosEva-tab" href="/{{$curso->id}}/resultados">Resultados</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">

                <!--RESULTADOS-->
                    <div class="tab-pane fade show active" id="resultadosEva" role="tabpanel" aria-labelledby="resultados-tab">
                        <input id="curso_id" type="number" hidden value="{{ $curso->id }}">
                        
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/series-label.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                       
                        <figure class="highcharts-figure">
                            <div id="grafica"></div>
                        </figure>
                        
                        <br>
                        <hr>
                        <br>

                        <figure class="highcharts-figure">
                            <div id="grafica2"></div>
                        </figure>

                    </div>

                    <div class="text-center">
                        <button class="btn btn-asm" onclick="verPersonas()">Ver listado de Personas que han concluido el curso</button>
                    </div>
                    <br>

                    <div class="container">
                        <div class="row">
                            <div class="col-8">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered text-center" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Apellido Paterno</th>
                                            <th class="text-center">Apellido Materno</th>
                                            <th class="text-center">Correo</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablaResult"></tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered text-center" style="width:100%">
                                        <thead>
                                            <tr>
                                            <th class="text-center">Calificacion</th>
                                            <th class="text-center">Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tableEstatus"></tbody>
                                                    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<!--Modificar Info del Curso-->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function viewInfoCurso(id){
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "/getCInfo/"+id,
            success: function(data){
                console.log(data);
                document.getElementById("pNombre").innerHTML=data.nombreCurso
                $("#nombreCurso").val(data.nombreCurso);
                document.getElementById("pInfo").innerHTML=data.descripcionCurso
                document.getElementById("pModalidad").innerHTML=data.modalidad
                document.getElementById("pLugar").innerHTML=data.lugar
                document.getElementById("pFechaInicio").innerHTML=data.fechaInicio
                document.getElementById("pFechaFin").innerHTML=data.fechaFin
                $("#descripcionCurso").val(data.descripcionCurso);
                $("#lugar").val(data.lugar);
                $("#fechaInicio").val(data.fechaInicio);
                $("#fechaFin").val(data.fechaFin);
                //Para los minimos y maximos de fecha de activacion de examen
                document.getElementById("fechaActivar").removeAttribute("min");
                $("#fechaActivar").attr({"min" : data.fechaInicio});
                //Para los minimos y maximos de fecha de activacion de examen
                document.getElementById("fechaDesactivar").removeAttribute("min");
                $("#fechaDesactivar").attr({"min" : data.fechaFin});
                document.getElementById("pNomP").innerHTML=data.nombrePonente
                document.getElementById("pInfP").innerHTML=data.infoPonente
                $("#nombrePonente").val(data.nombrePonente);
                $("#infoPonente").val(data.infoPonente);
                document.getElementById("pHoraInicio").innerHTML=data.horaInicio
                document.getElementById("pHoraFin").innerHTML=data.horaFin
                document.getElementById("pHorasTotales").innerHTML=data.horasTotales
                $("#horaInicio").val(data.horaInicio);
                $("#horaFin").val(data.horaFin);
                $("#horasTotales").val(data.horasTotales);
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                alert("Status: " + textStatus); alert("Error: " + errorThrown);
            }
        });
    }
    //EDITAR NOMBRE DEL CURSO
    function editNombre(){
        document.getElementById("updateNombre").removeAttribute("hidden");
        document.getElementById("cancelNombre").removeAttribute("hidden");
        document.getElementById("nombreCurso").removeAttribute("hidden");
        document.getElementById("pNombre").classList.remove('d-inline');
        document.getElementById("pNombre").classList.add('d-none');
        document.getElementById("editNombre").classList.remove('btn');
        document.getElementById("editNombre").classList.remove('d-inline');
        document.getElementById("editNombre").classList.add('d-none');
    }
    function cancelNombre(){
        document.getElementById("updateNombre").setAttribute("hidden", true);
        document.getElementById("cancelNombre").setAttribute("hidden", true);
        document.getElementById("nombreCurso").setAttribute("hidden", true);
        document.getElementById("pNombre").classList.remove('d-none');
        document.getElementById("pNombre").classList.add('d-inline');
        document.getElementById("editNombre").classList.remove('d-none');
        document.getElementById("editNombre").classList.add('btn');
        document.getElementById("editNombre").classList.add('d-inline');
    }
    $('#nombreForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#nombreForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelNombre();
                viewInfoCurso(id);
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
    // EDITAR INFORMACION DEL CURSO
    function editInfo(){
        document.getElementById("updateInfo").removeAttribute("hidden");
        document.getElementById("cancelInfo").removeAttribute("hidden");
        document.getElementById("pInfo").setAttribute("hidden", true);
        document.getElementById("pModalidad").setAttribute("hidden", true);
        document.getElementById("pLugar").setAttribute("hidden", true);
        document.getElementById("pFechaInicio").setAttribute("hidden", true);
        document.getElementById("pFechaFin").setAttribute("hidden", true);
        document.getElementById("descripcionCurso").removeAttribute("hidden");
        document.getElementById("modalidad").removeAttribute("hidden");
        document.getElementById("lugar").removeAttribute("hidden");
        document.getElementById("fechaInicio").removeAttribute("hidden");
        document.getElementById("fechaFin").removeAttribute("hidden");
    }
    function cancelInfo(){
        document.getElementById("updateInfo").setAttribute("hidden", true);
        document.getElementById("cancelInfo").setAttribute("hidden", true);
        document.getElementById("pInfo").removeAttribute("hidden");
        document.getElementById("pModalidad").removeAttribute("hidden");
        document.getElementById("pLugar").removeAttribute("hidden");
        document.getElementById("pFechaInicio").removeAttribute("hidden");
        document.getElementById("pFechaFin").removeAttribute("hidden");
        document.getElementById("descripcionCurso").setAttribute("hidden", true);
        document.getElementById("modalidad").setAttribute("hidden", true);
        document.getElementById("lugar").setAttribute("hidden", true);
        document.getElementById("fechaInicio").setAttribute("hidden", true);
        document.getElementById("fechaFin").setAttribute("hidden", true);
    }
    $('#infoForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#infoForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelInfo();
                viewInfoCurso(id);
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
    // EDITAR INFORMACION DEL PONENTE
    function editPonente(){
        document.getElementById("updateP").removeAttribute("hidden");
        document.getElementById("cancelP").removeAttribute("hidden");
        document.getElementById("pNomP").setAttribute("hidden", true);
        document.getElementById("pInfP").setAttribute("hidden", true);
        document.getElementById("LnombrePonente").removeAttribute("hidden");
        document.getElementById("LinfoPonente").removeAttribute("hidden");
        document.getElementById("nombrePonente").removeAttribute("hidden");
        document.getElementById("infoPonente").removeAttribute("hidden");
    }
    function cancelPonente(){
        document.getElementById("updateP").setAttribute("hidden", true);
        document.getElementById("cancelP").setAttribute("hidden", true);
        document.getElementById("pNomP").removeAttribute("hidden");
        document.getElementById("pInfP").removeAttribute("hidden");
        document.getElementById("LnombrePonente").setAttribute("hidden", true);
        document.getElementById("LinfoPonente").setAttribute("hidden", true);
        document.getElementById("nombrePonente").setAttribute("hidden", true);
        document.getElementById("infoPonente").setAttribute("hidden", true);
    }
    $('#ponenteForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#ponenteForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelPonente()
                viewInfoCurso(id);
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
    // EDITAR HORARIO
    function editHorario(){
        document.getElementById("updateH").removeAttribute("hidden");
        document.getElementById("cancelH").removeAttribute("hidden");
        document.getElementById("pHoraInicio").setAttribute("hidden", true);
        document.getElementById("pHoraFin").setAttribute("hidden", true);
        document.getElementById("pHorasTotales").setAttribute("hidden", true);
        document.getElementById("horaInicio").removeAttribute("hidden");
        document.getElementById("horaFin").removeAttribute("hidden");
        document.getElementById("horasTotales").removeAttribute("hidden");
    }
    function cancelHorario(){
        document.getElementById("updateH").setAttribute("hidden", true);
        document.getElementById("cancelH").setAttribute("hidden", true);
        document.getElementById("pHoraInicio").removeAttribute("hidden");
        document.getElementById("pHoraFin").removeAttribute("hidden");
        document.getElementById("pHorasTotales").removeAttribute("hidden");
        document.getElementById("horaInicio").setAttribute("hidden", true);
        document.getElementById("horaFin").setAttribute("hidden", true);
        document.getElementById("horasTotales").setAttribute("hidden", true);
    }
    $('#horarioForm').on('submit', function(e){
        var id = $('#idCurso').val();
        e.preventDefault()
        $.ajax({
            type: 'PUT',
            url: "/updateCInfo/"+id,
            dataType: "json",
            data: $('#horarioForm').serialize(),
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se han guardado los cambios',
                    showConfirmButton: false,
                    timer: 1500
                });
                cancelHorario()
                viewInfoCurso(id);
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

<!--Grafica Resultados de Evaluacion-Curso-->
<script>
    var respuesta;
    var curso_id = $('#curso_id').val();
    var ExcelenteRes = new Array();
    var BuenoRes = new Array();
    var RegularRes = new Array();
    var DeficienteRes = new Array();
    //VARPROMEDIO
    var promedioExc;
    var promedioBue;
    var promedioReg;
    var promedioDef;
            $.ajax({
                async: false,
                url: '/resultadosGrafica/'+curso_id,
                type:'GET',
                success:(function(res){
                    $(res).each(function(key,value){
                    respuesta = res;
                    ExcelenteRes.push(value.Excelente);
                    BuenoRes.push(value.Bueno);
                    RegularRes.push(value.Regular);
                    DeficienteRes.push(value.Deficiente);
                    });
                })
            });
            var arrayExcelentes = new Array();
            for (var i = 0; i < ExcelenteRes.length; i++) {
                var ExceNum = parseInt(ExcelenteRes[i]);
                arrayExcelentes.push(ExceNum);
            }
            var arrayBuenos = new Array();
            for (var i = 0; i < BuenoRes.length; i++) {
                var Num = parseInt(BuenoRes[i]);
                arrayBuenos.push(Num);
            }
            var arrayRegulares = new Array();
            for (var i = 0; i < RegularRes.length; i++) {
                var Num = parseInt(RegularRes[i]);
                arrayRegulares.push(Num);
            }
            var arrayDeficientes = new Array();
            for (var i = 0; i < DeficienteRes.length; i++) {
                var Num = parseInt(DeficienteRes[i]);
                arrayDeficientes.push(Num);
            }
            //PROMEDIOS DATOS DE GRAFICA
            var sum = 0;
            for(var j = 0; j<arrayExcelentes.length; j++){
                sum += arrayExcelentes[j];
            }
            promedioExc = sum/arrayExcelentes.length;
            var sum1 = 0;
            for(var j = 0; j<arrayBuenos.length; j++){
                sum1 += arrayBuenos[j];
            }
            promedioBue = sum1/arrayBuenos.length;
            var sum2 = 0;
            for(var j = 0; j<arrayRegulares.length; j++){
                sum2 += arrayRegulares[j];
            }
            promedioReg = sum2/arrayRegulares.length;
            var sum3 = 0;
            for(var j = 0; j<arrayDeficientes.length; j++){
                sum3 += arrayDeficientes[j];
            }
            promedioDef = sum3/arrayDeficientes.length;
        Highcharts.chart('grafica', {
    title: {
        text: 'Resultado de Evaluación - Reacción de la capacitación'
    },
    subtitle: {
        text: 'Curso y Ponente'
    },
    yAxis: {
        title: {
            text: 'Promedio de Respuestas'
        }
    },
    xAxis: {
        title:{
            text:'Respuestas'
        },
        categories: ['Excelente','Bueno','Regular','Deficiente']
        
        
    },
    //Leyendas
    legend: {
        layout: 'horizontal',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            
        }
    },
    series: [{
        type: 'column',
        name: 'Respuesta',
        data: [promedioExc,promedioBue,promedioReg,promedioDef]
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 100
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
    });
</script>

<!--Grafica Resultados de Evaluacion Conocimientos-->
<script>
    var respuesta;
    var curso_id = $('#curso_id').val();
    var sum0=0;
    var sum1=0;
    var sum2=0;
    var sum3=0;
    var sum4=0;
    var sum5=0;
    var sum6=0;
    var sum7=0;
    var sum8=0;
    var sum9=0;
    var sum10=0;
    $.ajax({
        async: false,
        url: '/resultadosGraficaExamen/'+curso_id,
        type:'GET',
        success:(function(data){
            $(data).each(function(key,value){

                if(value.calificacion >= 0 && value.calificacion < 1){
                    sum0++;
                }else if(value.calificacion >= 1 && value.calificacion < 2){
                    sum1++;
                }else if(value.calificacion >= 2 && value.calificacion < 3){
                    sum2++;
                }else if(value.calificacion >= 3 && value.calificacion < 4){
                    sum3++;
                }else if(value.calificacion >= 4 && value.calificacion < 5){
                    sum4++;
                }else if(value.calificacion >= 5 && value.calificacion < 6){
                    sum5++;
                }else if(value.calificacion >= 6 && value.calificacion < 7){
                    sum6++;
                }else if(value.calificacion >= 7 && value.calificacion < 8){
                    sum7++;
                }else if(value.calificacion >= 8 && value.calificacion < 9){
                    sum8++;
                }else if(value.calificacion >= 9 && value.calificacion < 10){
                    sum9++;
                }else if(value.calificacion == 10){
                    sum10++;
                }

            });
        })
    });

    Highcharts.chart('grafica2', {
    title: {
        text: 'Resultados de la Evaluación de Conocimientos Adquiridos'
    },
    subtitle: {
        text: ''
    },
    yAxis: {
        title: {
            text: 'Numero de personas'
        }
    },
    xAxis: {
        title:{
            text:'Calificaciones'
        },
        categories: ['0-0.9','1-1.9','2-2.9','3-3.9','4-4.9','5-5.9','6-6.9','7-7.9','8-8.9','9-9.9','10']
        
        
    },
    //Leyendas
    legend: {
        layout: 'horizontal',
        align: 'right',
        verticalAlign: 'middle'
    },
    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            
        }
    },
    series: [{
        type: 'column',
        name: 'Personas',
        data: [sum0,sum1,sum2,sum3,sum4,sum5,sum6,sum7,sum8,sum9,sum10]
    }],
    responsive: {
        rules: [{
            condition: {
                maxWidth: 100
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }
    });
</script>

<script> 
    function verPersonas(){
        eliminarTabla(); 
        var Calificacion="";
        var Nombre="";
        var AMaterno="";
        var APaterno="";
        var Estatus="";
        var email = "";
        var curso_id = $('#curso_id').val();
        $.ajax({
        async: false,
        url: '/resultadosGraficaExamen/'+curso_id,
        type:'GET',
        success:(function(data){
            var tablaDatos = $("#tableEstatus");
            $(data).each(function(key,value){
                Calificacion=value.calificacion;
                        parseInt(Calificacion);
                if(Calificacion<6){
                    Estatus = "Reprobado";
                }else{
                    Estatus = "Aprobado";
                }
                tablaDatos.append(
                '<tr class="hide">'+
                '<td class="pt-3-half">'+value.calificacion+'</td>'+
                '<td class="pt-3-half">'+Estatus+'</td>'+
                '</tr>'); 
            });
        })
    });


    $.ajax({
        async: false,
        url: '/verUsuarioAprobado/'+curso_id,
        type:'GET',
        success:(function(data){
            var tablaDatos = $("#tablaResult");
            $(data).each(function(key,value){
                tablaDatos.append(
            '<tr class="hide">'+
            '<td class="pt-3-half">'+value.name+'</td>'+
            '<td class="pt-3-half">'+value.apPaterno+'</td>'+
            '<td class="pt-3-half">'+value.apMaterno+'</td>'+
            '<td class="pt-3-half">'+value.email+'</td>'+
            '</tr>');           
            });
        })
    });
     
}

    function eliminarTabla(){
        var tablaDatos = $("#tableEstatus");
        tablaDatos.empty();
        var tablaDatos2 = $("#tablaResult");
        tablaDatos2.empty();
    }

</script>



@endsection