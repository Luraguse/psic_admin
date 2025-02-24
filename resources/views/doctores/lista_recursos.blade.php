@include("layout.header")
<p><a class="btn btn-primary" href="/agregar_tarea">Agregar tarea</a></p>
<table class="table">
    <thead>
    <tr>
        <th>Nombre tarea</th>
        <th>Acción</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tareas as $tarea)
        <tr>
            <td>{{$tarea["name"]}}</td>
            <td>
                <a class="btn btn-success" href="/tarea/{{$tarea["id"]}}">Ver</a>
                <a class="btn btn-primary" href="/asignar_tarea/{{$tarea["id"]}}">Asignar tarea</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include("layout.footer")
