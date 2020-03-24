@extends('layouts.menu')
@section('content')
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
@endsection