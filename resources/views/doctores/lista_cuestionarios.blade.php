@include("layout.header")
<h4>Lista de cuestionarios</h4>
<a class="btn btn-primary" href="/agregar_cuestionario">Agregar cuestionario</a>
<a class="btn btn-success" href="/asignar_cuestionarios">Asignar cuestionario</a>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            @if(Auth::user()->nivel=="admin")
                <th>Doctor</th>
            @endif
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cuestionarios as $cuestionario)
            <tr>
                <td>{{$cuestionario->nombre}}</td>
                @if(Auth::user()->nivel=="admin")
                    <td>{{$cuestionario->doctor->name}}</td>
                @endif
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
