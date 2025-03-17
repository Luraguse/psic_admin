<div class="accordion-body" id="">
    <h4>Tareas asignadas</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre de la tarea</th>
            <th>Terminada</th>
            <th>Evaluada</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tareas_paciente as $tarea_paciente)
            <tr>
                <td>{{$tarea_paciente->tarea->nombre}}</td>
                <td>{{$tarea_paciente->terminado?"Si":"No"}}</td>
                <td>{{$tarea_paciente->evaluacion?"Si":"No"}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route("tareas.ver", ["id"=>$tarea_paciente->id])}}">Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
