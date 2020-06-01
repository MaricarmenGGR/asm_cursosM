<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion del Curso</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    
</head>
<body>
@foreach($cursos as $curso)
    <h2>Curso: {{$curso->nombreCurso}}</h2>
    <h3>Informacion: </h3>
    <h5>Descripcion: {{$curso->descripcionCurso}}</h5>
    <h5>Ponente: {{$curso->nombrePonente}}</h5>
    <h6>Informacion del Ponente: {{$curso->infoPonente}}</h6>
    <table class="table table-striped table-bordered">
        <thead class="text-center font-weight-bolder">
            <tr>
            <th>Lugar</th>
            <th>Fecha de Inicio</th>
            <th>Fecha de Termino</th>
            <th>Horario</th>
            <th>Horas totales</th>
            <th>Modalidad</th>
            </tr>
        </thead>
        <tbody class="text-center font-weight-normal">
            @foreach($cursos as $cursoT)
            <tr>
                <td>{{$cursoT->lugar}}</td>
                <td>{{$cursoT->fechaInicio}}</td>
                <td>{{$cursoT->fechaFin}}</td>
                <td>{{$cursoT->horaInicio}} - {{$curso->horaFin}}</td>
                <td>{{$cursoT->horasTotales}}</td>
                <td>{{$cursoT->modalidad_id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h5>Programa del Curso</h5>
    <table class="table table-striped table-bordered">
        <thead class="text-center font-weight-bolder">
        <tr>
            <th>Actividad</th>
            <th>Hora</th>
            <th>Fecha</th>
        </tr>
        </thead>
        <tbody class="text-center font-weight-normal">
            @foreach($programas as $programa)
            <tr>
                <td>{{$programa->actividad}}</td>
                <td>{{$programa->hora}}</td>
                <td>{{$programa->fechaActividad}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h5>Listado de Materiales</h5>
    <table class="table table-striped table-bordered">
        <thead class="text-center font-weight-bolder">
            <tr>
                <th>Nombre de Materiales utilizados</th>
            </tr>
        </thead> 
        <tbody class="text-center font-weight-normal">
            @foreach($materiales as $material)
            <tr>
                <td>{{$material->url}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
   
    <h5>Areas invitadas: </h5>
    @foreach($areas as $area)
    <h6> {{$area->nombre}} </h6>
    @endforeach
    <h5>Lista de Asistencia:</h5>
    <table class="table table-striped table-bordered">
        <thead class="text-center font-weight-bolder">
            <tr>
                <th>Nombre</th>
                <th>CURP</th>
                <th>Área</th>
            </tr>
        </thead>
        <tbody class="text-center font-weight-normal">
            @foreach($inscritos as $inscrito)
                <tr>
                    <td>{{$inscrito->name}} {{$inscrito->apPaterno}} {{$inscrito->apMaterno}}</td>
                    <td>{{$inscrito->curp}}</td>
                    <td>{{$inscrito->nombre}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endforeach
</body>
</html>

