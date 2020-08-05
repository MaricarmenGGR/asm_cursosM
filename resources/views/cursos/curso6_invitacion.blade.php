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
                            <a class="nav-item nav-link active" id="invitacion-tab" href="/{{$curso->id}}/invitacion">Invitación</a>
                            <a class="nav-item nav-link" id="resultadosEva-tab" href="/{{$curso->id}}/resultados">Resultados</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                <!--INVITACION-->    
                    <div class="tab-pane fade show active" id="invitacion" role="tabpanel" aria-labelledby="invitacion-tab">
                        <h1>INVITACIÓN</h1>
                        <!--Podemos subir el oficio-->
                        <div class="card-body">
                                        <form id="subirInvitacion" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="file-field">
                                                
                                                <span>Selecciona los archivos</span>
                                                <input type="file" class="form-control" id="documento" multiple name="documento[]">
                                                <input type="hidden" value="{{$curso->id}}" name="curso_id">
                                                
                                            </div>
                                            <br>
                                            <button type="submit" class="btn btn-asm float-right" id="subeInvitacion">Subir al Sistema</button>
                                            <br>
                                        </form>
                                    </div>
                        <div class="card-body">
                            <form id="correosInvitacionForm" class="form-group">
                            {{ csrf_field() }}
                                <div class="form-group" >
                                    <label>Agregar los correos electrónicos separados por una coma (,) Ej. example@email.com,example2@email.com</label><br>
                                    <textarea class="form-control" id="correosInvitados" name="correosInvitados" placeholder="Correos Electrónicos"></textarea>
                                </div>
                                    <input type="hidden" value="{{$curso->id}}" name="curso_id" id="curso_id">
                                <div class="form-group">
                                    <button class="btn btn-asm float-right" id="enviarInvitacionCorreo">Enviar a Correos</button>
                                    
                                </div>
                            </form>
                        </div>
                                    
                        <br>
                        
                        <br>
                        <h3>AREAS</h3>
                        <form method="POST" action="/editarAreas/{{ $curso->id }}" id="modificarAreasForm">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{$curso->id}}" name="curso_id">
                            <div class="form-row">
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                @php $c=0; @endphp
                                @foreach($areas as $area)
                                    
                                    @php $c=$c+1; @endphp  
                                    <div class="form-check">
                                        @if($curso->verificarArea( $curso->id , $area->id ) )
                                        <input class="form-check-input" type="checkbox" id="area_{!! $area->id !!}" name="area[]" value="{!! $area->id !!}" checked onclick="showInput(this)">
                                        @else
                                        <input class="form-check-input" type="checkbox" id="area_{!! $area->id !!}" name="area[]" value="{!! $area->id !!}" onclick="showInput(this)">
                                        @endif
                                        <label class="form-check-label" for="defaultCheck1">
                                            {!! $area->nombre !!}
                                        </label>
                                    </div>
                                    
                                    @if($curso->verificarArea( $curso->id , $area->id ) )
                                    <div class="form-group col-lg-6">
                                        <input placeholder="Cupo" type="number" class="form-control form-control-sm" id="cupo_{!! $area->id !!}" name="cupo[]" min=1 value="{!! $curso->cupoArea( $curso->id, $area->id ) !!}">
                                    </div>
                                    @else
                                    <div class="form-group col-lg-6">
                                        <input placeholder="Cupo" style="display: none;" type="number" class="form-control form-control-sm" id="cupo_{!! $area->id !!}" name="cupo[]" min=1>
                                    </div>
                                    @endif

                                @endforeach
                                <input type="number" id="total_areas" value="{{ $c }}" hidden>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-asm btn-block" onclick="return confirmar(event)" >Guardar</button>
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

<!--Modificar Areas-->
<script>
function confirmar(e)
{
    e.preventDefault();

    var flag=0;
    var total_areas = $('#total_areas').val();

    for(var i=1; i<=total_areas; i++){
        
        if( $("#area_"+i).prop('checked') ){
            
            if( $('#cupo_'+i).val() < 1){
                Swal.fire({
                    icon: 'error',
                    text: 'El cupo de cada área invitada debe ser mayor a 1',
                })
                flag=1;
            }
            
        }
    }

    if(flag==0){
        Swal.fire({
            icon: 'warning',
            text: 'Los trabajadores inscritos serán expulsados del curso ¿desea continuar con la operación?',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.value) {
                document.getElementById("modificarAreasForm").submit();
            }
        })
    }

}

function showInput(checkbox){
    var numero = checkbox.id;
    var num = numero.split("_");
    
    if($(checkbox).prop('checked')) {
        $('#cupo_'+num[1]).css('display','block');
        $('#cupo_'+num[1]).prop("disabled", false);
    } else {
        $('#cupo_'+num[1]).css('display','none');
        $('#cupo_'+num[1]).attr("required", false);
        $('#totalCupos').val( $('#totalCupos').val() - $('#cupo_'+num[1]).val() );
        $('#cupo_'+num[1]).val("");
    }
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
                    title: 'Invitación en el Sistema',
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

    $("#enviarInvitacionCorreo").click(function (e) {
        e.preventDefault();
        var curso_id = $('#curso_id').val();
        var correos = $('#correosInvitados').val();
        var token = '{{csrf_token()}}';
        var data={_token:token,curso_id:curso_id,correosInvitados:correos};
        $.ajax({
        type: "POST",
        url: "/enviarCorreos",
        data: data,
        success: function(response){
            Swal.fire({
                icon: 'success',
                title: 'Invitacion Enviada a correos propuestos',
                showConfirmButton: false,
                timer: 1500
            });
            console.log(data);
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
