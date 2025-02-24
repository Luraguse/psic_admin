<div class="row collapse" id="collapseCuestionarios">
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
                        <a class="btn btn-primary" href="/contestar_cuestionario/{{$cuestionario->id}}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
