@extends('layouts.menu')
@section('content')
<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Usuarios</a>
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
                                        <th>Area</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->apPaterno}}</td>
                                        <td>{{$usuario->apMaterno}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>{{$usuario->role->descripcion}}</td>
                                        <td>
                                            <p class="text-center">
                                                <a href={{route('usuarios.show',$usuario->id)}}><i class="fas fa-eye"></i></a>
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection