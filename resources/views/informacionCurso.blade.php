<!DOCTYPE html>
<html>
    <table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Lugar</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Finalización</th>
    
    </tr>
    
    </thead>
    <tbody>
       @foreach($cursos as $curso)
       <tr>
           <td>{{$curso->nombreCurso}}</td>
           <td>{{$curso->lugar}}</td>
           <td>{{$curso->lugar}}</td>
       </tr>
        @endforeach

    </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Identificador de Curso</th>
                <th>Actividad</th>
                <th>Hora</th>
            </tr>
        </thead>
        <tbody>
        @foreach($programas as $programa)
       <tr>
           <td>{{$programa->actividad}}</td>
           <td>{{$programa->hora}}</td>
           <td>{{$programa->curso_id}}</td>
       </tr>
        @endforeach

        </tbody>
    </table>
</html>