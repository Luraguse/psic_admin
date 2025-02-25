@include("layout.header")
<h3>Lista de cuestionarios</h3>
<a class="btn btn-primary" href="/agregar_cuestionario">Agregar cuestionario</a>
<a class="btn btn-success" href="/asignar_cuestionarios">Asignar cuestionario</a>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cuestionarios as $cuestionario)
            <tr>
                <td>{{$cuestionario->nombre}}</td>
                <td>
                    <a class="btn btn-primary" href="/cuestionario/{{$cuestionario->id}}">Ver</a>
                    @if(!array_key_exists($cuestionario->id, $asignados))
                        <a class="btn btn-success" href="/actualizar_cuestionario/{{$cuestionario->id}}">Editar</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include("layout.footer")
