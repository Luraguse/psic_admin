<div class="accordion-body" id="">
    <h4>Historial de sesiones</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Fecha</th>
            <th></th>
            <th>Mensaje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mensajes as $mensaje)
            <tr>
                <td>{{ \Carbon\Carbon::parse($mensaje->created_at)->format("d-m-Y H:i:s") }}</td>
                <td></td>
                <td>{{$mensaje->mensaje}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
