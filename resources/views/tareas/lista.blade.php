@include("layout.header")
<h4>Lista de tareas</h4>
<div>
    <a class="btn btn-primary" href="{{route("tareas.agregar")}}">Agregar tarea</a>
    <a class="btn btn-success" href="{{route("tareas.ligar")}}">Asignar tarea</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            @if(Auth::user()->nivel=="admin")
                <th>Doctor</th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach($tareas as $tarea)
            <tr>
                <td>{{$tarea->nombre}}</td>
                <td>{{$tarea->tarea}}</td>
                @if(Auth::user()->nivel=="admin")
                    <td>{{$tarea->doctor->name??""}}</td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>
@include("layout.footer")
