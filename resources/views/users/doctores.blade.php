@include("layout.header")
<table class="table">
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Cantidad pacientes</th>
        <th>Ver</th>
    </tr>
    </thead>
    <tbody>
    @foreach($doctores as $doctor)
        <tr>
            <td>{{ $doctor->name }}</td>
            <td>{{ $doctor->email }}</td>
            <td>{{ count($lista_pacientes[$doctor->id])??0 }}</td>
            <td>
                <a type="button" class="btn btn-primary" href="/doctor/{{$doctor->id}}">Ver</a>
                <a type="button" class="btn btn-success" href="/edit_user/{{$doctor->id}}">Editar</a>
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
