@extends('layouts.menu')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <br>
            
            <h2>&nbsp;&nbsp;Curso: $nombre_curso</h2>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs" style="margin-top: 1%;">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        
                            <a class="nav-item nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Información General</a>
                            <a class="nav-item nav-link" id="programa-tab" data-toggle="tab" href="#programa" role="tab" aria-controls="programa" aria-selected="false">Programa y Material</a>
                            <a class="nav-item nav-link" id="evaluacion-tab" data-toggle="tab" href="#evaluacion" role="tab" aria-controls="evaluacion" aria-selected="false">Evaluación</a>
                        
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">
                        <h1>Información del Curso</h1>
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
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="programa" role="tabpanel" aria-labelledby="programa-tab">
                        <h1>Programa del curso</h1>
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
                        <h1>Evaluación</h1>
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