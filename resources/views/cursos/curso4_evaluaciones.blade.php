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

            <input id="curso_id" type="number" hidden value="{{ $curso->id }}">
            <input id="examen_id" type="number" hidden value="{{ $curso->examen->id }}">

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
                        <div class="row">    
                            <div class="col-lg-4 justify-content-center">

                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Cuestionario de evaluación-reacción del curso</h4>
                                        <div class="card-body">
                                            
                                            <label><strong>Activar encuesta</strong></label>
                                            <form id="examenPonenteActivarForm" class="form-group form-inline">
                                                {{ csrf_field() }}
                                                    <div class="form-group form-inline" >
                                                        <label>Fecha Inicio</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaActivarEva" name="fechaActivarEva" min="{{ $curso->fechaInicio }}" required><!--&nbsp;&nbsp;&nbsp;&nbsp;-->
                                                    </div>
                                                    <div class="form-group form-inline">
                                                        <label>Fecha Fin</label>&nbsp;&nbsp;
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
                            <br>
                            <div class="col-lg-8 justify-content-center">
                                
                                    <div class="card">
                                        <h4 class="card-header card-header_curso text-center font-weight-bold text-uppercase py-3">Evaluación de conocimientos adquiridos</h4>
                                        <div class="card-body">
                                            <label><strong>Activar examen</strong></label>
                                            <form id="examenActivarForm" class="form-group form-inline">
                                                {{ csrf_field() }}
                                                @if( ! $curso->examen->estaActivado( $curso->examen->id ) )
                                                    <div class="form-group form-inline" >
                                                        <label>Fecha Inicio</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaActivarExm" name="fechaActivar" min="{{ $curso->fechaInicio }}" max="{{ $curso->fechaFin }}" value="{{ $curso->examen->fechaActivar }}" required onchange="cambiarFechaFin()">&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group form-inline">
                                                        <label>Fecha Fin</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaDesactivarExm" name="fechaDesactivar" min="{{ $curso->fechaInicio }}" max="{{ $curso->fechaFin }}" value="{{ $curso->examen->fechaDesactivar }}" required>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group">
                                                            <a class="btn btn-asm float-right" id="activarExamen" onclick="activarExamen()" style="color: white;" >Activar</a>
                                                    </div>
                                                @else
                                                    <div class="form-group form-inline" >
                                                        <label>Fecha Inicio</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaActivarExm" name="fechaActivar" min="{{ $curso->fechaInicio }}" max="{{ $curso->fechaFin }}" value="{{ $curso->examen->fechaActivar }}" onchange="cambiarFechaFin()" readonly>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group form-inline">
                                                        <label>Fecha Fin</label>&nbsp;&nbsp;
                                                        <input type="date" class="form-control" id="fechaDesactivarExm" name="fechaDesactivar" min="{{ $curso->fechaInicio }}" max="{{ $curso->fechaFin }}" value="{{ $curso->examen->fechaDesactivar }}" readonly>&nbsp;&nbsp;&nbsp;&nbsp;
                                                    </div>
                                                    <div class="form-group">
                                                            <a class="btn btn-danger float-right" id="desactivarExamen" onclick="desactivarExamen()" style="color: white;">Desactivar</a>
                                                    </div>
                                                @endif
                                            </form>
                                            <label><strong>Vista previa de examen</strong></label>
                                            
                                                <div class="panel-body">

                                                <div class="panel-group" id="accordionExamen" role="tablist" aria-multiselectable="true">            
                                                    @php $counter=0; @endphp
                                                    @if( ! $curso->examen->estaActivado( $curso->examen->id ) )
                                                        
                                                        @if( $curso->examen->tienePreguntas( $curso->examen->id ) ) 

                                                            @php $preguntas = $curso->examen->obtenerPreguntas( $curso->examen->id ); @endphp    

                                                            @foreach( $preguntas as $pregunta )
                                                            
                                                            @php $counter = $counter + 1; @endphp
                                                            <div class="col-sm-12" style="margin-bottom: 0;">
                                                                <div class="card panel panel-default" id="panel{{ $counter }}">
                                                                    <div class="card-header panel-heading" role="tab" id="heading{{ $counter }}">
                                                                        <h5 class="mb-0 panel-title">
                                                                            <div class="d-flex">
                                                                                <a class="mr-auto p-2" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordionExamen" aria-expanded="true" aria-controls="collapse{{ $counter }}"> 
                                                                                    <p accesskey="{{ $counter }}" class="d-inline" id="pPregunta_{{ $counter }}">{{ $pregunta->preguntaTxt }} </p>
                                                                                    
                                                                                    <form action="/modificarPregunta" method="post" id="formMPregunta_{{ $counter }}">
                                                                                        {{ csrf_field() }}
                                                                                        <input hidden type="number" value="{{ $pregunta->id }}" name="pregunta_id">
                                                                                        <input hidden type="text" value="{{ $pregunta->preguntaTxt }}" id="inputPregunta_{{ $counter }}" name="preguntaTxt" onkeypress="this.style.width = ((this.value.length + 1) * 8) + 'px';">
                                                                                        <button hidden type="submit" class="clean" id="btnGPregunta_{{ $counter }}" onclick="actualizarPregunta({{ $counter }})">
                                                                                            <i class="fas fas fa-save"></i>
                                                                                        </button> 
                                                                                        <button hidden class="clean" onclick="cancelPregunta({{ $counter }})" id="btnCPregunta_{{ $counter }}">
                                                                                            <i class="fas fa-window-close"></i>
                                                                                        </button>
                                                                                    </form>

                                                                                    
                                                                                </a>
                                                                                    <a accesskey="{{ $counter }}" class="p-2 edit_ctg_label pull-right"><button class="clean"><i class="fas fa-pencil-alt"></i></button></a>

                                                                                    <form action="/borrarPregunta" method="post" id="formBPregunta_{{ $counter }}">
                                                                                        {{ csrf_field() }}
                                                                                        <input hidden type="number" value="{{ $pregunta->id }}" name="pregunta_id">
                                                                                    </form>
                                                                                        <a style="color:#dd4b39;" href="" accesskey="{{ $counter }}" class="p-2 remove_ctg_panel exit-btn pull-right" onclick="borrarPregunta({{ $counter }})"><i class="fas fa-trash-alt"></i></a>
                                                                                    
                                                                            </div>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="panel-collapse collapse show"role="tabpanel" aria-labelledby="heading'+{{ $counter }}+'">
                                                                        <form action="/guardarRespuestas" method="post" id="formGuardarRespuestas_{{ $counter }}" >
                                                                            {{ csrf_field() }}
                                                                            <input type="number" name="pregunta_id" value="{{ $pregunta->id }}" hidden>
                                                                            <div class="card-body panel-body">
                                                                                <div id="TextBoxDiv{{ $counter }}">
                                                                                    @if( $pregunta->tieneRespuestas( $pregunta->id ) ) 
                                                                                        @php $respuestas = $pregunta->obtenerRespuestas( $pregunta->id ); $c=0; @endphp 
                                                                                        @foreach( $respuestas as $respuesta )
                                                                                            @php $c=$c+1; @endphp
                                                                                            <div class="col-lg-12 d-flex">
                                                                                                <input type="text" name="ctgtext[]" class="p-2 form-control" style="width: 40%;" value="{{ $respuesta->respuestaTxt }}" id="input_ctgtext}" required/>
                                                                                                @if($respuesta->correcto == 1)
                                                                                                <input type="radio" class="form-check-input" name="ctgcorrecto" value="{{ $c }}" checked required/>
                                                                                                @else
                                                                                                <input type="radio" class="form-check-input" name="ctgcorrecto" value="{{ $c }}" required/>
                                                                                                @endif
                                                                                                <a href="" class="d-flex remove_field exit-btn"><i class="fas fa-trash-alt"></i></a>
                                                                                            </div><br>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                                <a class="btn btn-xs btn-primary" accesskey="{{ $counter }}" id="addButton3" ><i class="fas fa-plus"></i>&nbsp;Añadir Respuesta</a>
                                                                                <!--<input type="submit" class="btn btn-xs btn-success" accesskey="1" id="guardarButton" value="Guardar Respuesta" />-->
                                                                                <a class="btn btn-xs btn-success" accesskey="1" id="guardarButton" onclick="guardarRespuestas({{ $counter }})">Guardar Respuestas</a>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach

                                                        @endif

                                                    @else

                                                        @php $preguntas = $curso->examen->obtenerPreguntas( $curso->examen->id ); @endphp    

                                                        @foreach( $preguntas as $pregunta )
                                                        
                                                            @php $counter = $counter + 1; @endphp
                                                            <div class="col-sm-12" style="margin-bottom: 0;">
                                                                <div class="card panel panel-default" id="panel{{ $counter }}">
                                                                    <div class="card-header panel-heading" role="tab" id="heading{{ $counter }}">
                                                                        <h5 class="mb-0 panel-title">
                                                                            <div class="d-flex">
                                                                                <a class="mr-auto p-2" id="panel-lebel'+ counter +'" role="button" data-toggle="collapse" data-parent="#accordionExamen" aria-expanded="true" aria-controls="collapse{{ $counter }}"> 
                                                                                    <p accesskey="{{ $counter }}" class="d-inline" id="pPregunta_{{ $counter }}">{{ $pregunta->preguntaTxt }} </p>
                                                                                </a>
                                                                            </div>
                                                                        </h5>
                                                                    </div>
                                                                    <div class="panel-collapse collapse show"role="tabpanel" aria-labelledby="heading'+{{ $counter }}+'">
                                                                        <form action="/guardarRespuestas" method="post" id="formGuardarRespuestas_{{ $counter }}" >
                                                                            {{ csrf_field() }}
                                                                            <input type="number" name="pregunta_id" value="{{ $pregunta->id }}" hidden>
                                                                            <div class="card-body panel-body">
                                                                                <div id="TextBoxDiv{{ $counter }}">
                                                                                    @if( $pregunta->tieneRespuestas( $pregunta->id ) ) 
                                                                                        @php $respuestas = $pregunta->obtenerRespuestas( $pregunta->id ); $c=0; @endphp 
                                                                                        @foreach( $respuestas as $respuesta )
                                                                                            @php $c=$c+1; @endphp
                                                                                            <div class="col-lg-12 d-flex">
                                                                                                <input type="text" name="ctgtext[]" class="p-2 form-control" style="width: 40%;" value="{{ $respuesta->respuestaTxt }}" id="input_ctgtext}" readonly/>
                                                                                                @if($respuesta->correcto == 1)
                                                                                                <input type="radio" class="form-check-input" name="ctgcorrecto" value="{{ $c }}" checked disabled/>
                                                                                                @else
                                                                                                <input type="radio" class="form-check-input" name="ctgcorrecto" value="{{ $c }}" disabled/>
                                                                                                @endif
                                                                                            </div><br>
                                                                                        @endforeach
                                                                                    @endif
                                                                                </div>
                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    @endif

                                                    <input hidden type="number" id="counter" value="{{ $counter }}" > 


                                                        
                                                </div>

                                                @if( ! $curso->examen->estaActivado( $curso->examen->id ) )
                                                    <form action="/crearPregunta" method="post" id="formCrearPregunta">
                                                        {{ csrf_field() }}
                                                    </form>
                                                    <div class="col-md-12 text-center" style="margin-top:15px;">
                                                        <button class="btn btn-success" id="nuevaButton"><i class="fas fa-plus"></i>&nbsp;Nueva Pregunta</button>
                                                    </div>
                                                @endif

                                                    
                                                </div>
                                                <!-- /.panel-body -->
                                                <div class="panel-footer">
                                                    <div class="col-sm-offset-3 col-sm-6 text-center">
                                                        
                                                    </div>

                                                </div>
                                                <!-- /.box-footer -->
                                            

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
    </div>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>


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
        comprobarFechas(curso_id)
        
        function resizeInput() {
            $(this).attr('size', $(this).val().length);
        }

        $('input[type="text"]')
            // event handler
            .keyup(resizeInput)
            // resize on page load
            .each(resizeInput);
            });
</script>

<!-- EVALUACION CONOCIMIENTOS ADQUIRIDOS -->
<script>
    var curso_id = $('#curso_id').val();
    var examen_id = $('#examen_id').val();

    $(document).ready(function(){
	    var counter = $("#counter").val()+1;
	    var wrapper = $("#accordionExamen");
        
        $("#nuevaButton").on("click", function(e){ 
            e.preventDefault();
            
            Swal.fire({
                title: 'Redacte la pregunta',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Añadir Pregunta',
                showLoaderOnConfirm: true,
                preConfirm: (preguntaTxt) => {
                    $('#formCrearPregunta').append('<input type="text" name="preguntaTxt" hidden value="'+preguntaTxt+'" >');
                    $('#formCrearPregunta').append('<input type="number" name="curso_id" hidden value='+curso_id+' >');
                    $('#formCrearPregunta').append('<input type="number" name="examen_id" hidden value='+examen_id+' >');
                    $("#formCrearPregunta").submit();
                }
            })

        });

        /*$("#addButton2").on("click", function(e){ 
            e.preventDefault();
            var catgName = prompt("Redacte la pregunta");
            if(catgName == ''){
                catgName = 'Catg#'+counter;
            }
            if(catgName != null){
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
                                    '<a class="btn btn-xs btn-success" accesskey="1" id="guardarButton">Guardar Respuestas</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'
                );
                counter++;
            }
        
        });*/
		
		/*var x = 1;
	     $(wrapper).on("click",".remove_ctg_panel", function(e){ 
				 e.preventDefault(); 
				 var accesskey = $(this).attr('accesskey');
		        $('#panel'+accesskey).remove();
				counter--;
				x--;
	     });*/
		 
	     var y = 0; 
	     $(wrapper).on("click","#addButton3", function(e){
	         e.preventDefault();
			 var accesskey = $(this).attr('accesskey');
			 y++; 
			 $('#panel'+accesskey).find('#TextBoxDiv'+accesskey).append(
                '<div class="col-lg-12 d-flex">'+
                    '<input type="text" name="ctgtext[]" class="p-2 form-control" style="width: 40%;" required id="input_ctgtext"/>'+
                    '<input type="radio" class="form-check-input" name="ctgcorrecto" value="'+y+'" required/>'+
                    '<a href="" class="d-flex remove_field exit-btn"><i class="fas fa-trash-alt"></i></a>'+
                '</div><br>');
	         
	     });
	     
	     $(wrapper).on("click",".remove_field", function(e){
	         e.preventDefault(); 
	     	$(this).parent('div').remove();y--;
	     })
	  	
	     $(wrapper).on("click",".edit_ctg_label", function(e){ 
	    	var panelId = $(this).attr('accesskey');
			
            document.getElementById("inputPregunta_"+panelId).removeAttribute("hidden");
            document.getElementById("btnGPregunta_"+panelId).removeAttribute("hidden");
            document.getElementById("btnCPregunta_"+panelId).removeAttribute("hidden");

            document.getElementById("pPregunta_"+panelId).classList.remove('d-inline');
            document.getElementById("pPregunta_"+panelId).classList.add('d-none');
		});
    });

    function cancelPregunta(id){
        document.getElementById("inputPregunta_"+id).setAttribute("hidden", true);
        document.getElementById("btnGPregunta_"+id).setAttribute("hidden", true);
        document.getElementById("btnCPregunta_"+id).setAttribute("hidden", true);

        document.getElementById("pPregunta_"+id).classList.remove('d-none');
        document.getElementById("pPregunta_"+id).classList.add('d-inline');

        $("#inputPregunta_"+id).val($("#pPregunta_"+id).text().trim());
    }

    function actualizarPregunta(id){
        var frm=$("#formMPregunta_"+id);
        var datos = frm.serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/modificarPregunta',
            data:datos,
            success:function(data){
                location.reload();
            },
            error:function(x,xs,xt){
                alert(x.responseText);
            }
        });
        
    }

    function borrarPregunta(id){
        var frm=$("#formBPregunta_"+id);
        var datos = frm.serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/borrarPregunta',
            data:datos,
            success:function(data){
                location.reload();
            },
            error:function(x,xs,xt){
                alert(x.responseText);
            }
        });
    }

    function guardarRespuestas(id){
            var valido = false;

        
            var frm=$("#formGuardarRespuestas_"+id);
            var datos = frm.serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/guardarRespuestas',
                data:datos,
                success:function(data){
                    location.reload();
                },
                error:function(e){
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Verifique que no haya dejado campos vacios y haya seleccionado una respuesta correcta'
                    })
                }
            });
            

        
    }

    $( "#formCrearPregunta" ).submit(function( e ) {
        e.preventDefault();
        var frm=$("#formCrearPregunta");
        var datos = frm.serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/crearPregunta',
            data:datos,
            success:function(data){
                location.reload();
            },
            error:function(x,xs,xt){
                alert(x.responseText);
            }
        });
        
    });




</script>

<!-- ACTIVAR / DESACTIVAR EXAMEN -->
<script>
    var examen_id = $('#examen_id').val();
    function desactivarExamen(){
        var frm=$("#examenActivarForm");
        frm.append('<input type="number" name="examen_id" hidden value='+examen_id+' >');
        var datos = frm.serialize();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'POST',
            url:'/desactivarExamen',
            data:datos,
            success:function(data){
                location.reload();
            },
            error:function(x,xs,xt){
                alert(x.responseText);
            
            }
        });
    }

    function activarExamen(){
        var numPreguntas = $("#counter").val();

        if( numPreguntas > 0 ){

            if( $( "#fechaActivarExm" ).val() == null || $( "#fechaActivarExm" ).val() == "" ){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe colocar una fecha de inicio'
                })
            }else if( $( "#fechaDesactivarExm" ).val() == null || $( "#fechaDesactivarExm" ).val() == "" ){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Debe colocar una fecha de fin'
                })
            } else if( new Date( $( "#fechaDesactivarExm" ).val() ) < new Date( $( "#fechaActivarExm" ).val() ) ){
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'La fecha de inicio debe ser antes de la fecha de fin'
                })
            } else {

                Swal.fire({
                    icon: 'warning',
                    text: 'Una vez que active el examen no podrá modificarlo',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ok',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        
                        var frm=$("#examenActivarForm");
                        frm.append('<input type="number" name="examen_id" hidden value='+examen_id+' >');
                        var datos = frm.serialize();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type:'POST',
                            url:'/activarExamen',
                            data:datos,
                            success:function(data){
                                location.reload();
                            },
                            error:function(x,xs,xt){
                                alert(x.responseText);
                            }
                        });
                        
                    }
                })

            }




        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'El examen no tiene preguntas'
            })
        }

    }

    function cambiarFechaFin(){
        $("#fechaDesactivarExm").removeAttr( "min" )
        $("#fechaDesactivarExm").attr( "min", $("#fechaActivarExm").val()  );
    }
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


@endsection
