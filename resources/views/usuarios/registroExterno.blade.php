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
                        <a class="nav-item nav-link active" id="users-tab" data-toggle="tab" role="tab" aria-controls="users" aria-selected="true">REGISTRO DE INVITADO EXTERNO</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
                        <form id="formRegistro">
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

                            <div class="form-row">
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Telefóno celular</label>
                                    </div>
                                    <input type="text" class="form-control" id="telfono" name="telfono" placeholder="Teléfono Celular" pattern="[0-9]{7,10}" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Cargo</label>
                                    </div>
                                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo" onkeypress="return soloLetras(event)" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Puesto</label>
                                    </div>
                                    <input type="text" class="form-control" id="puesto" name="puesto" placeholder="Puesto" onkeypress="return soloLetras(event)" required>
                                </div>
                                <div class="form-group col-lg-3" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Dependencia</label>
                                    </div>
                                    <input type="text" class="form-control" id="dependencia" name="dependencia" placeholder="Dependencia" onkeypress="return soloLetras(event)" required>
                                </div>                                
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center">
                                        <label>Correo Electrónico</label>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo electrónico" pattern="^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required>
                                </div>
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center" for="password">
                                        <label>Contraseña</label>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" pattern="^(?=.*?[a-z])(?=.*?[0-9]).{8,}$" placeholder="Contraseña" required autocomplete="new-password" title="La contraseña debe tener mínimo 8 caracteres, al menos un número y una letra">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4" style="padding: 0 2% 0 2%">
                                    <div class="text-center" for="password">
                                        <label>Confirma contraseña</label>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña" required autocomplete="new-password">
                                    <span id='message'></span>
                                </div>
                            </div>
                        <br>
                        <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-3">
                                    <button type="submit" class="btn btn-asm btn-block" >Registrarse</button>
                                </div>
                                <div class="col-lg-3">
                                    <a href="/" class="btn btn-secondary btn-block">Cancelar</a>
                                </div>
                                <div class="col-lg-3"></div>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('login') }}" id="loginForm">
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

<!--Script para solo letras en el nombre-->
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toLowerCase();
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
        especiales = [8, 37, 39, 46];
        tecla_especial = false;
        for(var i in especiales) {
            if(key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla) == -1 && !tecla_especial)
            return false;
    }

    $('#password, #password-confirm').on('keyup', function () {
        if( $('#password-confirm').val() != ""){
            if( ! comprobarContrasena() ) $('#message').html('Contraseñas no conciden').css('color', 'red');
            else $('#message').html('');
        }
    });

    function comprobarContrasena(){
        if ($('#password').val() == $('#password-confirm').val()){
            return true;    
        } else {
            return false;
        }
    }

    $('#formRegistro').on('submit', function(e){
        e.preventDefault();
        if( comprobarContrasena() ){
            var frm=$("#formRegistro");
            var datos = frm.serialize();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/agregaExterno',
                data:datos,
                success:function(data){
                    var frm=$("#loginForm");
                    frm.append('<input name="email" hidden value="'+$("#email").val()+'">');
                    frm.append('<input name="password" hidden value="'+$("#password").val()+'">');
                    frm.submit()
                },
                error:function(x,xs,xt){
                    Swal.fire({
                    icon: 'error',
                    text: 'Este correo ya está registrado, intente con otro',
                    showConfirmButton: true,
                });
                }
            });
        }
    });
    
</script>


</body>
</html>