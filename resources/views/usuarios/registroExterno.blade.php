<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Externo - ASM Cursos</title>

    <link rel="icon" href="../img/favicon-asm.png">
    <!-- FONT -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Rubik:400,500,800">

    <!-- CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!-- ALERTAS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
<div class="contenedor-fluid">
        <header>
            <nav class="navegacion row">
                <img src="../img/header_.png" width="100%" alt="header">
            </nav>
        </header>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card-tabs">
                <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="users-tab" data-toggle="tab" role="tab" aria-controls="users" aria-selected="true">REGISTRO DE USUARIO EXTERNO</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <form  method="POST" action="/agregaExterno" enctype="multipart/form-data">
                        <h3 class="text-center">DATOS REQUERIDOS</h3>
                            <hr> 
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Apellido Paterno</label>
                                    </div>
                                    <input type="text" class="form-control" id="apPaterno" name="apPaterno" placeholder="Apellido Paterno" onkeypress="return soloLetras(event)" required>
                                </div>
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Apellido Materno</label>
                                        <input type="text" class="form-control" id="apMaterno" name="apMaterno" placeholder="Apellido Materno" onkeypress="return soloLetras(event)" required>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Nombre(s)</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" onkeypress="return soloLetras(event)" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row align-self-center">
                                <div class="form-group col-lg-1" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Edad</label>
                                    </div>
                                    <input type="number"  class="form-control" id="edad" name="edad" placeholder="" min="0" max="100" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Sexo</label>
                                    </div>
                                    <div class="text-center">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="Masculino" value="Masculino" required>
                                        <label class="form-check-label" for="Masculino">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="Femenino" value="Femenino" required>
                                        <label class="form-check-label" for="Femenino">Femenino</label>
                                    </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Localidad</label>
                                        <input type="text" class="form-control" id="localidad" name="edoCivil" placeholder="Localidad" required>
                                    </div>
                                </div>

                                <div class="form-group col-lg-2" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Calle</label>
                                    </div>
                                    <input type="text"  class="form-control" id="calle" name="calle" placeholder="Calle" required>
                                </div>
                                <div class="form-group col-lg-2" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Colonia</label>
                                    </div>
                                    <input type="text"  class="form-control" id="colonia" name="colonia" placeholder="Colonia" required>
                                </div>
                                <div class="form-group col-lg-1" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>No.</label>
                                    </div>
                                    <input type="text" class="form-control" id="nCasa" name="nCasa" placeholder="#" required>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Telefóno celular</label>
                                    </div>
                                    <input type="text" class="form-control" id="telfono" name="telfono" placeholder="Teléfono Celular" maxlength="10" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>CURP</label>
                                    </div>
                                    <input type="text" class="form-control" id="curp" name="curp" placeholder="CURP" pattern="([A-Z][AEIOUX][A-Z]{2}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Correo Electrónico</label>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <label class="text-center" for="password">Contraseña</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                            </div>
                            <div class="form-row text-center">
                                <div class="form-group col-lg-12" style="padding: 0 2% 0 2%">
                                    <label for="password-confirm">Confirma Contreseña</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>

                            </div>
                        <br>
                        <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3">
                                    <button type="submit" name="submit" class="btn btn-asm btn-block">REGISTRARSE</button>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/" class="btn btn-secondary btn-block">CANCELAR</a>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
</body>
</html>