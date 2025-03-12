@include("layout.header")
<h4>Lista de pacientes</h4>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Doctor asignado</th>
            <th>Ver</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pacientes as $paciente)
        <tr>
            <td>{{ $paciente->name }}</td>
            <td>{{ $paciente->email }}</td>
            @if($paciente->doctor_id)
                <td>{{ $lista_doctores[$paciente->doctor_id] ?? "Sin doctor asignado" }}</td>
            @else
                <td class="table-danger text-center">Sin doctor</td>
            @endif
            <td>
                <a type="button" class="btn btn-primary" href="/paciente/{{$paciente->id}}">Ver</a>
                <a type="button" class="btn btn-success" href="/edit_user/{{$paciente->id}}">Editar</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@include("layout.footer")
<script>
    $(window).on("load", function(){

    })
</script>
