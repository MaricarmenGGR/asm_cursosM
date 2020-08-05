<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Departamento de Capacitacion de Auditoria Superior de Michoacán</h1>
    <h3>Identificador del Curso: {{$invitacion->curso_id}}</h3>
    <h3 id="nameDoc">Documento: {{$invitacion->documento}}</h3>
    
</body>
</html>

<script>
    function Descarga(){
        var documento = $('#nameDoc').val();
        $.ajax({
            url: "/downloadInvitacion/"+documento,
            type:'get'
        });

    }
</script>