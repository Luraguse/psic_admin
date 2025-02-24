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
                    <a class="btn btn-primary" href="/paciente/{{$paciente["id"]}}">Asignar tarea</a>
                    <a class="btn btn-warning" href="/paciente/{{$paciente["id"]}}">Asignar evaluación</a>
                    <a class="btn btn-danger" href="/paciente/{{$paciente["id"]}}">Añadir a diario</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include("layout.footer")
