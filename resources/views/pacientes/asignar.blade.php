@include("layout.header")
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('users.asignar_paciente') }}">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6>Lista de pacientes sin asignar ({{$pacientes->count()}} sin asignar)</h6>
            <select id="paciente_seleccionado" name="paciente_id" class="form-select" aria-label="Seleccionar un paciente">
                <option disabled selected>Seleccionar un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{$paciente["id"]}}">{{$paciente["name"]}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12">
            <h6>Lista de doctores</h6>
            <select id="doctor_seleccionado" name="doctor_id" class="form-select" aria-label="Seleccionar un doctor">
                <option disabled selected>Seleccionar un doctor</option>
                @foreach($doctores as $doctor)
                    <option value="{{$doctor["id"]}}">{{$doctor["name"]}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button id="asignar_submit" class="btn btn-primary d-none" type="submit">Asignar</button>
        </div>
    </div>
</form>


@include("layout.footer")
<script>
    $(document).on("change", "#paciente_seleccionado,#doctor_seleccionado", function() {
        var paciente = $("#paciente_seleccionado").val()
        var doctor = $("#doctor_seleccionado").val()
        if(paciente && doctor) {
            $("#asignar_submit").removeClass("d-none")
        }
    })
</script>
