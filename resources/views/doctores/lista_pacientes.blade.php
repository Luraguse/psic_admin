@include("layout.header")
@if(count($pacientes) == 0)
    <h4 class="text-danger">No tiene pacientes asignados</h4>
@else
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
                <td>{{$paciente->paciente["name"]}}</td>
                <td>{{$paciente->paciente["email"]}}</td>
                <td>
                    <a class="btn btn-success" href="/paciente/{{$paciente->paciente["id"]}}">Ver</a>
                    <a class="btn btn-danger" href="{{route("users.edit_user", ["id"=>$paciente->paciente["id"]])}}">Editar</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@include("layout.footer")
