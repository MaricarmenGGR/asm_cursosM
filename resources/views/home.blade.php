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
                            <a><i class="fas fa-cog"></i></a>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                        
                    <a href="{{ route('cursos') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
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
                            <a><i class="fas fa-cog"></i></a>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>

                    <a href="{{ route('cursos') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
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
                            <a><i class="fas fa-cog"></i></a>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>

                    <a href="{{ route('cursos') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
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
                            <a><i class="fas fa-cog"></i></a>
                        </div>
                    </div>
                    <hr>
                    <p class="card-text">
                        Descripción
                    </p>
                        
                    <a href="{{ route('cursos') }}" class="black-text d-flex justify-content-end">
                        <h5>Ver más <i class="fas fa-angle-double-right"></i></h5>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right">
        <button class="btn btn-outline-light"><a href={{ route("createcurso.index") }} class="black-text d-flex justify-content-end">
                        <h5>Crear un nuevo curso</h5></a></button>
    </div>
</div>

@endsection