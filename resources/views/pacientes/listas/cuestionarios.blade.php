<div class="accordion-body" id="">
    <h4>Cuestionarios asignados</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre del cuestionario</th>
            <th>Terminado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cuestionarios_paciente as $cuestionario_paciente)
            <tr>
                <td>{{$cuestionario_paciente->cuestionario->nombre}}</td>
                <td>{{$cuestionario_paciente->terminado?"Si":"No"}}</td>
                <td>
                    <a class="btn btn-primary" href="/contestar_cuestionario/{{$cuestionario_paciente->id}}"
                       target="_blank">{{$cuestionario_paciente->terminado?"Ver":"Contestar"}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
