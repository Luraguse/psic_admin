@include("layout.header")
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
            <td>{{ $lista_doctores[$paciente->doctor_id] ?? "Sin doctor asignado" }}</td>
            <td><a type="button" class="btn btn-primary" href="/paciente/{{$paciente->id}}">Ver</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
@include("layout.footer")
<script>
    $(window).on("load", function(){

    })
</script>
