@include("layout.header")
<h4>Pacientes asignados</h4>
<table class="table">
    <thead>
        <tr>
            <th>Nombre del paciente</th>
            <th>Correo electrónico</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{$paciente->paciente->name}}</td>
                <td>{{$paciente->paciente->email}}</td>
                <td><a class="btn btn-success" href="/paciente/{{$paciente->paciente->id}}">Ver</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@include("layout.footer")
