@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="users-tab" data-toggle="tab" role="tab" aria-controls="users" aria-selected="true">Trabajadores Internos</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th>Area</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($usuarios as $usuario)
                                    @if( $usuario->area->id != 10  )
                                    <tr>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->apPaterno}}</td>
                                        <td>{{$usuario->apMaterno}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->telfono}}</td>
                                        <td>{{$usuario->area->nombre}}</td>
                                        <td>
                                            <p class="text-center">
                                                <a href={{route('usuarios.show',$usuario->id)}}><i class="fas fa-eye"></i></a>
                                                <!--<input id="idUserInterno" name="user_id" type="hidden" value='{{$usuario->id}}'>-->
                                            </p>
                                        </td>
                                        <!--<td>
                                            <p class="text-center">
                                                <a href='#' onclick="verBorradoInterno()"><i class="fas fa-trash-alt"></i></a>
                                            </p>
                                        </td>-->
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="users-tab" data-toggle="tab" role="tab" aria-controls="users" aria-selected="true">Invitados Externos</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <table id="dataTable2" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Email</th>
                                        <th>Teléfono</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($usuarios as $usuario)
                                    @if( $usuario->area->id == 10  )
                                    <tr>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->apPaterno}}</td>
                                        <td>{{$usuario->apMaterno}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->telfono}}</td>
                                        <td>
                                            <p class="text-center">
                                                <a href={{route('usuarios.show',$usuario->id)}}><i class="fas fa-eye"></i></a>
                                                <input id="idUserExterno" name="user_id" type="hidden" value='$usuario->id'>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-center">
                                                <a href='/rechazarExterno/{{$usuario->id}}'><i class="fas fa-trash-alt"></i></a>
                                            </p>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
<script>
        $(document).ready(function() {
            $('#dataTable2').DataTable( {
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            } );

        } );
    </script>

<script>
    function verBorradoExterno(){
        var id = $('#idUserExterno').val();
        console.log(id);
    }

    function verBorradoInterno(){
        var id = $('#idUserInterno').val();
        console.log(id);
    }


</script>
@endsection