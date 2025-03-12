@include("layout.header")
<table class="table">
    <thead>
        <tr>
            <th>Nombre paciente</th>
            <th>Correo electrónico</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{$paciente["name"]}}</td>
                <td>{{$paciente["email"]}}</td>
                <td>
                    <a class="btn btn-success" href="/paciente/{{$paciente["id"]}}">Ver</a>
                    <a class="btn btn-danger" href="{{route("users.edit_user", ["id"=>$paciente["id"]])}}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include("layout.footer")
