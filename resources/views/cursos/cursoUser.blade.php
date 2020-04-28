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
                            @if( Auth::user()->estaInscrito($curso->id) )
                            <a class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa y Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación</a>
                            @endif
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <h2>Información del Curso</h2>
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
                                    {{$curso->descripcionCurso}}
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
                                    {{$curso->horaIncio}} - {{$curso->horaFin}}
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
                            <br>
                            @if( ! Auth::user()->estaInscrito($curso->id) )
                                <div class="row">
                                    <div class="col-lg-2"></div>
                                    <div class="col-lg-8">
                                        <button type="button" class="btn btn-block btn-asm" data-toggle="modal" data-target="#modalInscripcion{{$curso->id}}">
                                            Inscribirme
                                        </button>
                                    </div>
                                    <div class="col-lg-1"></div>
                                </div>
                                <!-- MODAL -->
                                <div class="modal fade" id="modalInscripcion{{$curso->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Inscripción</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            ¿Desea inscribirse al curso {{$curso->nombreCurso}}?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">NO</button>
                                                <form method="post" action="/inscribirse">
                                                    @csrf
                                                    <input type="number" name="idCurso" value="{{$curso->id}}" hidden>
                                                    <button type="submit" class="btn btn-sm btn-success">SÍ</button>
                                                </form>  
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                    <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">
                        <h2>Programa del curso</h2>
                        <br>
                        <br>
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
                            <td>Presentacion</td>
                            <td>12:00 Horas</td>
                            <td><a download="mi-nombre-nuevo.mp3" href="https://drive.google.com/drive/u/0/folders/1I1ryIjX1K-pi1533IeYD7mxyQR9gS75j">Enlace para descargar el Material</a></td>
                            </tr>
                        </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="evaluacion" role="tabpanel" aria-labelledby="evaluacion-tab">
                        <h2>Evaluación</h2>
                        <br>
                        <br>
                        <h5>(E) Excelente, (B) Bueno, (R) Regular, (D) Deficiente</h5>
                    <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
                    <h3 class="text-center">DEL INSTRUCTOR/CAPACITOR</h3>
                        <thead class="thead-dark text-center">
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Dominó el tema que impartió</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Fomentó la participación del grupo</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Ilustró el tema con casos prácticos</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td>Dio a conocer los objetivos del curso</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                            <td>Aclaró dudas</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                        <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
                    <h3 class="text-center">DEL CURSO/TALLER</h3>
                        <thead class="thead-dark text-center">
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">6</th>
                            <td>Los temas impartidos, contienen un equilibrio teórico-práctico</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">7</th>
                            <td>Los materiales y manuales empleados fueron suficientes</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">8</th>
                            <td>El tiempo programado fue el adecuado para cumplir con el objetivo del curso</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                        </table>
                        <table class="table mx-auto col-lg-10 col-md-10 col-sm-10 col-xs-10 text-center">
                    <h3 class="text-center">DE LA ORGANIZACIÓN DEL EVENTO</h3>
                        <thead class="thead-dark text-center">
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">Respuesta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">9</th>
                            <td>Se entregó el material a tiempo </td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">10</th>
                            <td>El funcionamiento del equipo audiovisual fue adecuado</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">11</th>
                            <td>El salón fue adecuado para el curso/taller</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">12</th>
                            <td>El salón fue adecuado para el curso/taller</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">13</th>
                            <td>La atención por parte del Departamento de Capacitación</td>
                            <td>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                    <input type="radio" name="options" id="option1" checked> E
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option2"> B
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> R
                                </label>
                                <label class="btn btn-secondary">
                                    <input type="radio" name="options" id="option3"> D
                                </label>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                        </table>

                        <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Sugerencias y comentarios:</span>
                        </div>
                        <textarea class="form-control" aria-label="sugerencias"></textarea>
                        <button type="button" class="btn btn-secondary float-right">Enviar</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection