@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <br>
            
            <div class="text-center">
                <h1>&nbsp;&nbsp;Curso: {!! $curso->nombreCurso !!}</h1>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs" style="margin-top: 1%;">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        
                            <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                            <a class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa</a>
                            <a class="nav-item nav-link" id="material-tab" data-toggle="tab" href="#material" role="tab" aria-controls="material" aria-selected="false">Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación</a>
                            <a class="nav-item nav-link" id="asistencia-tab" data-toggle="tab" href="#asistencia" role="tab" aria-controls="asistencia" aria-selected="false">Asistencia</a>
                            <a class="nav-item nav-link" id="invitacion-tab" data-toggle="tab" href="#invitacion" role="tab" aria-controls="invitacion" aria-selected="false">Invitación</a>
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab"><h2>Información del Curso</h2>
                        <br>
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Información general curso
                                    </button>
                                </h5>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                {!! $curso->descripcionCurso !!}
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Horario
                                    </button>
                                </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    {!! $curso->horaInicio !!} - {!! $curso->horaFin !!}
                                </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Información del ponente
                                    </button>
                                </h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    Nombre del ponente:  {!! $curso->nombrePonente !!} <br>
                                    Curriculom:  {!! $curso->descripcionPonente !!}
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">
                        <h1>Programa del curso</h1>
                        <br>
                        <br>
                        <div class="table-responsive">
                            <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <thead class="thead-dark ">
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Hora</th>
                                    <th scope="col">Material</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <th scope="row">1</th>
                                    <td><input type="text" placeholder="Actividad"></td>
                                    <td><input type="time" placeholder="Hora"></td>
                                    <td><input type="text" placeholder="Material"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button type="button" class="btn btn-secondary">Editar</button>
                    </div>
                    <div class="tab-pane fade" id="material" role="tabpanel" aria-labelledby="material-tab">
                        <h1>MATERIAL</h1>
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Subir Archivo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                        </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                        <h1>Evaluación</h1>
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/series-label.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>
                    <script src="https://code.highcharts.com/modules/export-data.js"></script>
                    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                    <figure class="highcharts-figure">
                        <div id="container"></div>
                        <p class="highcharts-description">
                           Grafica de Ejemplo para los resultado de la evalucion del Ponente
                        </p>
                    </figure>
                             
                    </div>
                    <div class="tab-pane fade" id="asistencia" role="tabpanel" aria-labelledby="asistencia-tab">
                        <h1>Asistencia</h1>
                        <br>
                        <br>
                        <h5>(A) Asistio, (F) Falta</h5>
                        <div class="table-responsive">
                            <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Apellido Paterno</th>
                                    <th scope="col">Apellido Materno</th>
                                    <th scope="col">Nombre(s)</th>
                                    <th scope="col">Área</th>
                                    <th scope="col">Asistencia de Entrada</th>
                                    <th scope="col">Asistencia de Salida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $count = 1 @endphp
                                    @foreach($inscritos as $inscrito)
                                        
                                        <tr>
                                            <th scope="row">{!! $count !!}</th>
                                            <td>{!! $inscrito->apPaterno !!}</td>
                                            <td>{!! $inscrito->apMaterno !!}</td>
                                            <td>{!! $inscrito->name !!}</td>
                                            <td>{!! $inscrito->nombre !!}</td>
                                            <th>
                                                <!-- Marcacion de los botones segun la asistencia marcada-->
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-secondary active">
                                                    <input type="radio" name="options" id="option1" checked> A
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <input type="radio" name="options" id="option2"> F
                                                </label>
                                                </div>
                                            </th>
                                            <th>
                                                <!-- Marcacion de los botones segun la asistencia marcada-->
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-secondary active">
                                                    <input type="radio" name="options" id="option1" checked> A
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <input type="radio" name="options" id="option2"> F
                                                </label>
                                                </div>
                                            </th>
                                        </tr>
                                        @php $count++ @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="invitacion" role="tabpanel" aria-labelledby="invitacion-tab">
                        <h1>INVITACIÓN</h1>
                        <!--Podemos subir el oficio-->
                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Subir Archivo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                            aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Seleccionar Archivo</label>
                        </div>
                        </div>
                        <br>
                        <h3>Titular de área: Nombre del Titular del Area</h3><h3>Estatus:(Vista) o (No Vista)</h3>
                        <br>
                        <h3>AREAS</h3>
                        @foreach($areas as $area)
                            {!! $area->nombre !!} <br>
                        @endforeach
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    Highcharts.chart('container', {

title: {
    text: 'Solar Employment Growth by Sector, 2010-2016'
},

subtitle: {
    text: 'Source: thesolarfoundation.com'
},

yAxis: {
    title: {
        text: 'Number of Employees'
    }
},

xAxis: {
    accessibility: {
        rangeDescription: 'Range: 2010 to 2017'
    }
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2010
    }
},

series: [{
    name: 'Installation',
    data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
}, {
    name: 'Manufacturing',
    data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
}, {
    name: 'Sales & Distribution',
    data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
}, {
    name: 'Project Development',
    data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
}, {
    name: 'Other',
    data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
}],

responsive: {
    rules: [{
        condition: {
            maxWidth: 500
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

