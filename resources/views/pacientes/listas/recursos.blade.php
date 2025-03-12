<div class="accordion-body" id="">
    <h4>Recursos asignados</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Visto</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($recursos_usuario as $recurso_usuario)
            <tr>
                <td>{{$recurso_usuario->recurso->nombre}}</td>
                <td>{{$recurso_usuario->recurso->descripcion}}</td>
                <td>{{$recurso_usuario->terminado?"Si":"No"}}</td>
                <td>
                    @if($recurso_usuario->recurso->tipo=="documento")
                        <a class="btn btn-sm btn-primary" href="{{route("recursos.download", ["id"=>$recurso_usuario->id])}}" target="_blank">Descargar</a>
                    @elseif($recurso_usuario->recurso->tipo=="video")
                        <a class="btn btn-sm btn-danger" href="{{route("recursos.download", ["id"=>$recurso_usuario->id])}}" target="_blank">Ver</a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script>

</script>
