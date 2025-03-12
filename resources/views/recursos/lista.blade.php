@include("layout.header")
<h4>Lista de Recursos</h4>
<div>
    <a class="btn btn-success" href="{{route('recursos.agregar_recurso')}}">Agregar</a>
    <a class="btn btn-primary" href="{{route('recursos.asignar')}}">Asignar recurso</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo</th>
            @if(Auth::user()->nivel=="admin")
                <th>Doctor</th>
            @endif
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($recursos as $recurso)
            <tr>
                <td>{{$recurso->nombre}}</td>
                <td>{{$recurso->descripcion}}</td>
                <td>{{ucfirst($recurso->tipo)}}</td>
                @if(Auth::user()->nivel=="admin")
                    <td>{{$recurso->usuario->name}}</td>
                @endif
                @if($recurso->tipo=="documento")
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route("recursos.download", ["id"=>$recurso->id])}}" target="_blank">Descargar</a>
                    </td>
                @elseif($recurso->tipo=="video")
                    <td>
                        <a class="btn btn-sm btn-success" href="{{$recurso->liga}}" target="_blank">Ver</a>
                    </td>
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@include("layout.footer")
