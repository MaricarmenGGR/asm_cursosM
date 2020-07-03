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
                        <h1>Resultados en grafica</h1>
                        <script src="https://code.highcharts.com/highcharts.js"></script>
                        <script src="https://code.highcharts.com/modules/series-label.js"></script>
                        <script src="https://code.highcharts.com/modules/exporting.js"></script>
                        <script src="https://code.highcharts.com/modules/export-data.js"></script>
                        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                       
                        <figure class="highcharts-figure">
                            <div id="grafica"></div>
                            <p class="highcharts-description">
                            Grafica de Ejemplo para los resultado de la evalucion del Ponente
                            </p>
                        </figure>

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

<!--Agregar y leer de Actividades de Programa con AJAX-->
<script>
    $("#subirActividadDelCurso").click(function (e) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        var actividad = $('#actividad').val();
        var hora = $('#hora').val();
        var fechaActividad = $('#fechaActividad').val();
        var token = '{{csrf_token()}}';
        var data={_token:token,curso_id:curso_id,actividad:actividad,hora:hora,fechaActividad:fechaActividad};
        $.ajax({
        type: "post",
        url: "{{ route('programas.store') }}",
        data: data,
        success: function(response){
            Swal.fire({
                icon: 'success',
                title: 'Se agrego una Actividad Nueva',
                showConfirmButton: false,
                timer: 1500
            });
            eliminarTabla()
            verTabla(curso_id)
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
    
    function verTabla(id){
        $.ajax({
            url:'/listar/'+id,
            type:'get',
        }).done(function(res){
            var tablaDatos = $("#actividadesPrograma");
            $(res).each(function(key,value){
            tablaDatos.append(
            '<tr class="hide">'+
            '<td class="pt-3-half">'+value.curso_id+'</td>'+
            '<td class="pt-3-half">'+value.actividad+'</td>'+
            '<td class="pt-3-half">'+value.hora+'</td>'+
            '<td class="pt-3-half">'+value.fechaActividad+'</td>'+
            '<td>'+
            '<span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light" value="'+value.id+'" onClick="EliminarAct(this);">Borrar</button></span>'+
            '</td>'+
            '</tr>');
            });
        });
    }
    //Borrar Actividades
    function EliminarAct(btn){
        var actividad = $('#actividad').val();
        var ruta = "/borrarAct/"+btn.value;
        var token = '{{csrf_token()}}';
        var curso_id = btn.value;
        $.ajax({
            url:ruta,
            headers:{'X-CSRF-TOKEN':token},
            type:'delete',
            dataType : 'json',
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Actividad Eliminada',
                    showConfirmButton: false,
                    timer: 1500
                });
                verTabla(curso_id);
            }
        });
    }
    function eliminarTabla(){
        var tablaDatos = $("#actividadesPrograma");
        tablaDatos.empty();
    }
</script>
<!--Crud Materiales con AJAX-->
<script>
    $('#materialNewForm').submit( function( e ) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        $.ajax({
            url: '{{ route("materiales.store") }}',
            type: 'POST',
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Se agregon los materiales',
                    showConfirmButton: false,
                    timer: 1500
                });
                eliminarTablaMaterial();
                verMateriales(curso_id);
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
    function verMateriales(id){
        $.ajax({
            url:'/verMateriales/'+id,
            type:'get',
        }).done(function(res){
            var tablaDatos = $("#materialesCurso");
            $(res).each(function(key,value){
                tablaDatos.append(
                '<tr class="hide">'+
                '<td class="pt-3-half">'+value.curso_id+'</td>'+
                '<td class="pt-3-half">'+value.url+'</td>'+
                '<td>'+
                '<span class="table-remove"><button type="button" class="btn btn-danger btn-rounded btn-sm my-0 waves-effect waves-light" value="'+value.id+'" onClick="EliminarMaterial(this);">Borrar</button></span>'+
                '</td>'+
                '</tr>')
            });
        });
    }
    function EliminarMaterial(btn){
        var ruta = "/borrarMaterial/"+btn.value;
        var token = '{{csrf_token()}}';
        var curso_id = btn.value;
        $.ajax({
            url:ruta,
            headers:{'X-CSRF-TOKEN':token},
            type:'delete',
            dataType : 'json',
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Archivo Eliminado',
                    showConfirmButton: false,
                    timer: 1500
                });
                eliminarTablaMaterial();
                verMateriales(curso_id);
            }
        });
    }
    function eliminarTablaMaterial(){
        var tablaDatos = $("#materialesCurso");
        tablaDatos.empty();
    }
</script>


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
                                                '<a style="color:#dd4b39;;" href="#" accesskey="'+ counter +'" class="p-2 remove_ctg_panel exit-btn pull-right"><i class="fas fa-trash-alt"></i></a>' +
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

<script>
    function verAsistentes(id) { //Llenar tabla de servicios solicitados
      var id_usuario=$('#id_usuario').val();
        $.ajax({
            url:'/verAsistentes/'+id,
            type:'get',
        }).done(function(response){
            console.log(response)
            let template = '';
            let contador = 0;
            $(response).each(function(key,value){
                contador++;
                template+=`
                <tr>
                    <td>`+contador+`</td>
                    <td>${value.apPaterno} ${value.apMaterno} ${value.name}</td>
                    <td>${value.curp}</td>
                    <td>${value.nombre}</td>
                    <td></td>
                    <td></td>
                </tr>            
                ` 
            });
            $('#bodyTableAsistencia').html(template);
            
        });
      
    }
</script>

<!--Invitaciones-->
<script>
    $('#subirInvitacion').submit( function( e ) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        $.ajax({
            url: '{{ route("invitacion.store") }}',
            type: 'POST',
            data: new FormData( this ),
            processData: false,
            contentType: false,
            success: function(response){
                Swal.fire({
                    icon: 'success',
                    title: 'Invitacion Enviada',
                    showConfirmButton: false,
                    timer: 1500
                });
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

<!--Evaluacion del ponente/Curso-->
<script>
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