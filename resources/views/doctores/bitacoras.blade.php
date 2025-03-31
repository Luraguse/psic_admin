@include("layout.header")
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($doctores as $doctor)
            <tr>
                <td>{{$doctor->name}}</td>
                <td>{{$doctor->email}}</td>
                <td><a class="btn btn-primary" href="{{route("bitacora.entradas", ["id"=>$doctor->id])}}">Ver</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@include("layout.footer")
