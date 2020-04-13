@extends('layouts.menu')
@section('content')
<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="users-tab" data-toggle="tab" role="tab" aria-controls="users" aria-selected="true">Lista de cursos</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <table id="dataTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Termino</th>
                                        <th>Status</th>
                                        <th>Publicado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Curso 1</td>
                                        <td>01/01/2020</td>
                                        <td>01/01/2020</td>
                                        <td>Planeando</td>
                                        <td>NO</td>
                                        <td>
                                            <p class="text-center">
                                                <a href={{route("verCurso")}}><i class="fas fa-eye"></i></a>
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>Curso 2</td>
                                        <td>02/01/2020</td>
                                        <td>02/01/2020</td>
                                        <td>Planeando</td>
                                        <td>NO</td>
                                        <td>
                                            <p class="text-center">
                                                <a href={{route("verCurso")}}><i class="fas fa-eye"></i></a>
                                            </p>
                                        </td>
                                    </tr>
                                
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection