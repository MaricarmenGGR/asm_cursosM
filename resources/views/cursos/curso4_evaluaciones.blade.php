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
                            <a class="nav-item nav-link active" id="evaluacion-tab" href="/{{$curso->id}}/evaluacion">Evaluación</a>
                            <a class="nav-item nav-link" id="asistencia-tab" href="/{{$curso->id}}/asistencia" >Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" href="/{{$curso->id}}/invitacion">Invitación</a>
                            <a class="nav-item nav-link" id="resultadosEva-tab" href="/{{$curso->id}}/resultados">Resultados</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">

                <!--EVALUACION-->    
                    <div class="tab-pane fade show active" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Evaluación de conocimientos adquiridos</h4>
                                        <div class="card-body">
                                            <label><strong>Activar examen</strong></label>
                                            <form id="examenActivarForm" class="form-group form-inline">
                                                {{ csrf_field() }}
                                                    
                                                    <div class="form-group form-inline" >
                                                        <label>Fecha Inicio</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaActivarExm" name="fechaActivar" min="{{ $curso->fechaInicio }}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group form-inline">
                                                        <label>Fecha Fin</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaDesactivarExm" name="fechaDesactivar" min="{{ $curso->fechaFin }}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                
                                                <input type="hidden" value="{{$curso->id}}" name="curso_id">
                                                <div class="form-group">
                                                    <button class="btn btn-asm float-right" id="subirActivacionExamen">Guardar</button>
                                                </div>
                                            </form>
                                            <label><strong>Vista previa de examen</strong></label>
                                            <form class="form-horizontal">
                                                <div class="panel-body">
                                                
                                                        <div class="panel-group" id="accordionExamen" role="tablist"
                                                            aria-multiselectable="true">
                                                        </div>
                                                        
                                                        <div class="col-md-12 text-center" style="margin-top:15px;">
                                                            <button class="btn btn-success" id="addButton" value=""><i class="fas fa-plus"></i>&nbsp;Nueva Pregunta</button>
                                                        </div>

                                                    
                                                </div>
                                                <!-- /.panel-body -->
                                                <div class="panel-footer">
                                                    <div class="col-sm-offset-3 col-sm-6 text-center">
                                                        
                                                    </div>

                                                </div>
                                                <!-- /.box-footer -->
                                            </form>

                                        </div>
                                    </div>
                                </div>                                 
                            </div>
                            <br>
                            <div class="row justify-content-center">
                                <div class="col-lg-10">
                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Cuestionario de evaluación-reacción del curso</h4>
                                        <div class="card-body">
                                            
                                            <label><strong>Activar encuesta</strong></label><br>
                                            <div class="form-group form-inline">
                                                <label><strong> Fecha Inicio: </strong></label> <input class="form-control" id="fEI" value="Fecha NO definida" disabled></input>
                                                <label><strong> Fecha Termino: </strong></label> <input class="form-control" id="fET" value="Fecha NO definida" disabled></input>
                                            </div>
                                            

                                            <form id="examenPonenteActivarForm" class="form-group form-inline">
                                                {{ csrf_field() }}
                                                    <div class="form-group form-inline" >
                                                        <label>Fecha Inicio</label>
                                                        <input type="date" class="form-control" id="fechaActivarEva" name="fechaActivarEva" min="{{ $curso->fechaInicio }}" required><!--&nbsp;&nbsp;&nbsp;&nbsp;-->
                                                    </div>
                                                    <div class="form-group form-inline">
                                                        <label>Fecha Fin</label>
                                                        <input type="date" class="form-control" id="fechaDesactivarEva" name="fechaDesactivarEva" min="{{ $curso->fechaFin }}" required><!--&nbsp;&nbsp;&nbsp;&nbsp;-->
                                                    </div>
                                                <input type="hidden" value="{{$curso->id}}" name="curso_id" id="curso_id">
                                                <div class="form-group">
                                                    <button class="btn btn-asm float-right" id="subirActivacionEncPonente">Activar</button>
                                                    <br>
                                                    <button class="btn btn-danger float-right" id="quitarActivacionEncPonente">Desactivar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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
                document.getElementById("pNombre").innerHTML=data.nombreCurso
                $("#nombreCurso").val(data.nombreCurso);
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
</script>

<script>
$( document ).ready(function() {
    //var curso_id = $('#curso_id').val();
    //eliminarTabla()
    //verTabla(curso_id)
    comprobarFechas(curso_id);
    ver(curso_id);
});
</script>

<!-- EVALUACION CONOCIMIENTOS ADQUIRIDOS -->
<script>
    
    $(document).ready(function(){
	    var counter = 1;
	    var wrapper = $("#accordionExamen");
	
		 $("#addButton").on("click", function(e){ 
	    	e.preventDefault();
	    	var catgName = prompt("Redacte la pregunta");
			if(catgName == ''){
				catgName = 'Catg#'+counter;
			}
			if(catgName != null){

                /*$.ajax({
                    url: '{{-- route("cuestionario.store") --}}',
                    type: 'POST',
                    data: {pregunta: catgName},
                    processData: false,
                    contentType: false,
                    async: false,
                    success: function(response){*/
                                
                        $(wrapper).append(
                            '<div class="col-sm-12" style="margin-bottom: 0;">'+
                                '<div class="card panel panel-default" id="panel'+ counter +'">' + 
                                    '<div class="card-header panel-heading" role="tab" id="heading'+ counter +'">'+
                                        '<h5 class="mb-0 panel-title">'+
                                            '<div class="d-flex">'+
                                                '<a class="mr-auto p-2" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordionExamen" href="#collapse'+ counter +'" ' + 'aria-expanded="true" aria-controls="collapse'+ counter +'"> '+catgName+' </a>'+
                                                '<a href="#" accesskey="'+ counter +'" class="p-2 edit_ctg_label pull-right"><i class="fas fa-pencil-alt"></i></a>' +
                                                '<a style="color:#dd4b39;" href="#" accesskey="'+ counter +'" class="p-2 remove_ctg_panel exit-btn pull-right"><i class="fas fa-trash-alt"></i></a>' +
                                            '</div>'+
                                        '</h5>'+
                                    '</div>' +
                                    '<div id="collapse'+ counter +'" class="panel-collapse collapse show"role="tabpanel" aria-labelledby="heading'+ counter +'">'+
                                        '<div class="card-body panel-body">'+
                                            '<div id="TextBoxDiv'+ counter +'"></div>'+
                                            '<a class="btn btn-xs btn-primary" accesskey="'+ counter +'" id="addButton3" ><i class="fas fa-plus"></i>&nbsp;Añadir Respuesta</a>' +
                                            '<a class="btn btn-xs btn-success" accesskey="1" id="ajax_submit_button">Guardar</a>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'
                        );
                        counter++;
                        
                    /*},
                    error: function(XMLHttpRequest, textStatus, errorThrown){
                        Swal.fire({
                            icon: 'error',
                            title: 'Ha ocurrido un error',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    }
                });*/


			}
			
	     });
		
		var x = 1;
	     $(wrapper).on("click",".remove_ctg_panel", function(e){ 
				 e.preventDefault(); 
				 var accesskey = $(this).attr('accesskey');
		        $('#panel'+accesskey).remove();
				counter--;
				x--;
	     });
		 
	     var y = 1; 
	     $(wrapper).on("click","#addButton3", function(e){
	         e.preventDefault();
			 var accesskey = $(this).attr('accesskey');
			 y++; 
			 $('#panel'+accesskey).find('#TextBoxDiv'+accesskey).append('<div class="col-lg-12 d-flex"><input type="text" name="ctgtext[]" class="p-2 form-control" style="width: 40%;"/><a href="#" class="d-flex remove_field exit-btn"><i class="fas fa-trash-alt"></i></a></div><br>');
	        
	     });
	     
	     $(wrapper).on("click",".remove_field", function(e){
	         e.preventDefault(); 
	     	$(this).parent('div').remove();y--;
	     })
	  	
	     $(wrapper).on("click",".edit_ctg_label", function(e){ 
	    	var panelId = $(this).attr('accesskey');
			var catgName = prompt("Edite la pregunta");
			if(catgName == ''){
				   return false;
			}
			 if(catgName != null){
				 $('#panel'+panelId).find("#panel-lebel"+panelId).html('').html(catgName);
			}		
		});
    });

    function guardarPregunta(){

    }


</script>

<!--Evaluacion del ponente/Curso-->
<script>
    function ver(id){
        var respuesta;
      var FechaInicio;
      var FechaTermino;
      $.ajax({
          async:false,
          url:'/fechas/'+id,
          type: 'GET',
          success:(function(res){
            $(res).each(function(key,value){
                 FechaInicio = value.fechaEmision;
                 FechaTermino = value.fechaTermino;
                 respuesta = res;
                });
          })
      });

      console.log(respuesta);
      console.log("Fecha inicio: "+FechaInicio);
      console.log("Fecha termino: "+ FechaTermino);
      if(FechaTermino == undefined & FechaInicio == undefined){
        var resFNT = document.getElementById("fET").value = "Fecha no Establecida";
        resFNT.value='Fecha no Establecida';
        var resFNI = document.getElementById("fEI").value = "Fecha no Establecida";
        resFNI.value='Fecha no Establecida';
        console.log('es nula y no existe');
      }else{
        var resF = document.getElementById("fEI").value = FechaInicio;
        var resFT = document.getElementById("fET").value = FechaTermino;

      }
      
        
    }

    

    function comprobarFechas(id){
      var respuesta;
      var FechaInicio;
      var FechaTermino;
      $.ajax({
          async:false,
          url:'/fechas/'+id,
          type: 'GET',
          success:(function(res){
            $(res).each(function(key,value){
                 FechaInicio = value.fechaEmision;
                 FechaTermino = value.fechaTermino;
                 respuesta = res;
                });
          })
      });
      //console.log(respuesta);
      //console.log("Fecha inicio: "+FechaInicio);
        //console.log("Fecha termino: "+ FechaTermino);
        if(respuesta === undefined){
            
        }else{
            const boton = document.getElementById("subirActivacionEncPonente");
            boton.disabled = true;
        }
       
    }
    
    $("#subirActivacionEncPonente").click(function (e) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        var fechaEmision = $('#fechaActivarEva').val();
        var fechaTermino = $('#fechaDesactivarEva').val();
        var token = '{{csrf_token()}}';
        var data={_token:token,curso_id:curso_id,fechaEmision:fechaEmision,fechaTermino:fechaTermino};
        $.ajax({
        type: "POST",
        url: "{{ route('evaluacion.store') }}",
        data: data,
        success: function(response){
            Swal.fire({
                icon: 'success',
                title: 'Hora Acordada',
                showConfirmButton: false,
                timer: 1500
            });
            console.log(data);
            const boton = document.getElementById("subirActivacionEncPonente");
            boton.disabled = true;
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

        $("#quitarActivacionEncPonente").click(function (e) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        var token = '{{csrf_token()}}';
        var data={_token:token,curso_id:curso_id};
        $.ajax({
        type: "DELETE",
        url: "/desactivarEvaluacion/"+curso_id,
        data:data,
        success: function(response){
            Swal.fire({
                icon: 'success',
                title: 'Desactivado',
                showConfirmButton: false,
                timer: 1500
            });
            const boton = document.getElementById("subirActivacionEncPonente");
            boton.disabled = false;
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

@endsection
