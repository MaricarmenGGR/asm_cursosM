@extends('layouts.menu')
@section('content')
{{--
<br>
<br>
<div class="row cursos">
<div class="col-md-4">
    <ul class="menu2">
        <li><div class="card" style="width: 18rem">
            <img class="card-img-top" src="../img/lala.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Nombre Curso</h5>
                <p class="card-text">Descripción</p>
                <a href="#" class="btn verde">Entrar</a>
            </div>
            </div></li>
    
    </ul>
</div>
<div class="col-md-4">
    <ul class="menu2">
        <li><div class="card" style="width: 18rem;">
        <img class="card-img-top" src="../img/lala.jpg" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Nombre Curso</h5>
                <p class="card-text">Descripción</p>
                <a href="#" class="btn verde">Entrar</a>
            </div>
            </div></li>
    </ul>
</div>
<div class="col-md-4">
    <ul class="menu2">
        <li>
            <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="../img/lala.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Nombre Curso</h5>
                    <p class="card-text">Descripción</p>
                    <a href="#" class="btn verde">Entrar</a>
                </div>
            </div>
        </li>
    </ul>
</div>
<br>
<a href="#" class="btn btn-secondary nuevo">Nuevo curso</a>
</div>
--}}
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                            <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p> 
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <button type="button" class="btn btn-asm float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Inscribirse</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DATOS PARA INSCRIPCIÓN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="nombreCompleto" class="col-form-label">Nombre Completo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">CURP:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Area de inscripción:</label>
                                <select class='custom-select'><option value='' disabled selected>Elige el área</option><option value='1'>1. Despacho del auditor Superior</option><option value='2'>2. Normatividad</option><option value='3'>3. Especial Estatal</option><option value='4'>4. Especial Municipal</option><option value='5'>5. Planeacion</option><option value='6'>6. Investigacion</option><option value='7'>7. Substanciacion</option><option value='8'>8. Unidad Gral. de Asuntos Jurídicos</option><option value='9'>9. Direccion Administrativa</option></select>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-asm">Aceptar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                             <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <button type="button" class="btn btn-asm float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Inscribirse</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DATOS PARA INSCRIPCIÓN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="nombreCompleto" class="col-form-label">Nombre Completo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">CURP:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Area de inscripción:</label>
                                <select class='custom-select'><option value='' disabled selected>Elige el área</option><option value='1'>1. Despacho del auditor Superior</option><option value='2'>2. Normatividad</option><option value='3'>3. Especial Estatal</option><option value='4'>4. Especial Municipal</option><option value='5'>5. Planeacion</option><option value='6'>6. Investigacion</option><option value='7'>7. Substanciacion</option><option value='8'>8. Unidad Gral. de Asuntos Jurídicos</option><option value='9'>9. Direccion Administrativa</option></select>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-asm">Aceptar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                             <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <button type="button" class="btn btn-asm float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Inscribirse</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DATOS PARA INSCRIPCIÓN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="nombreCompleto" class="col-form-label">Nombre Completo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">CURP:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Area de inscripción:</label>
                                <select class='custom-select'><option value='' disabled selected>Elige el área</option><option value='1'>1. Despacho del auditor Superior</option><option value='2'>2. Normatividad</option><option value='3'>3. Especial Estatal</option><option value='4'>4. Especial Municipal</option><option value='5'>5. Planeacion</option><option value='6'>6. Investigacion</option><option value='7'>7. Substanciacion</option><option value='8'>8. Unidad Gral. de Asuntos Jurídicos</option><option value='9'>9. Direccion Administrativa</option></select>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-asm">Aceptar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <img class="card-img-top" src="../img/lala.jpg" height="200" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-10">
                            <h4 class="card-title">Nombre Curso </h4>
                        </div>
                        <div class="col-2">
                             <!--<a><i class="fas fa-cog"></i></a>-->
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                    <button type="button" class="btn float-right"><a href={{ route("userviewcurso.index") }} class="black-text d-flex justify-content-end">Ver Contenido</a></button>
                    <button type="button" class="btn btn-asm float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Inscribirse</button>
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">DATOS PARA INSCRIPCIÓN</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                            <div class="form-group">
                                <label for="nombreCompleto" class="col-form-label">Nombre Completo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">CURP:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Correo:</label>
                                <input type="text" class="form-control" id="nombreCompleto">
                                <label for="nombreCompleto" class="col-form-label">Area de inscripción:</label>
                                <select class='custom-select'><option value='' disabled selected>Elige el área</option><option value='1'>1. Despacho del auditor Superior</option><option value='2'>2. Normatividad</option><option value='3'>3. Especial Estatal</option><option value='4'>4. Especial Municipal</option><option value='5'>5. Planeacion</option><option value='6'>6. Investigacion</option><option value='7'>7. Substanciacion</option><option value='8'>8. Unidad Gral. de Asuntos Jurídicos</option><option value='9'>9. Direccion Administrativa</option></select>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-asm">Aceptar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection