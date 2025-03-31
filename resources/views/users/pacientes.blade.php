@include("layout.header")
<h4>Lista de pacientes</h4>
<table class="table">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Doctor(es) asignado(s)</th>
            <th>Ver</th>
        </tr>
    </thead>
    <tbody>
    @foreach($lista_pacientes as $paciente)
        <tr>
            <td>{{ $paciente["paciente"]->name }}</td>
            <td>{{ $paciente["paciente"]->email }}</td>
            @if(count($paciente["doctores"]) > 0)
                <td>
                    @foreach($paciente["doctores"] as $doctor)
                        <p>{{$doctor->name}}</p>
                    @endforeach
                </td>
            @else
                <td class="table-danger text-center">Sin doctor</td>
            @endif
            <td>
                <a type="button" class="btn btn-primary" href="/paciente/{{$paciente["paciente"]->id}}">Ver</a>
                <a type="button" class="btn btn-success" href="/edit_user/{{$paciente["paciente"]->id}}">Editar</a>
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
