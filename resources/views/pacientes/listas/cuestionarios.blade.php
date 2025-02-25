<div class="row collapse" id="collapseCuestionarios">
    <h4>Cuestionarios asignados</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre del cuestionario</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
            @foreach($cuestionarios as $cuestionario)
                <tr>
                    <td>{{$cuestionario->nombre}}</td>
                    <td>
                        @if(Auth::user()->nivel=="doctor")
                            <a class="btn btn-primary" href="/ver_cuestionario/{{$cuestionario->id}}/{{$paciente_id}}" target="_blank">Ver</a>
                        @else
                            <a class="btn btn-primary" href="/contestar_cuestionario/{{$cuestionario->id}}">Ver</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
