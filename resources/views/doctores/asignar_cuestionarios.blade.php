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
<form method="POST" action="{{ route('users.asignar_cuestionario') }}">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6>Lista de cuestionarios ({{$cuestionarios->count()}} total)</h6>
            <select id="cuestionario_seleccionado" name="cuestionario_id" class="form-select" aria-label="Seleccionar un cuestionario">
                <option disabled selected>Seleccionar un cuestionario</option>
                @foreach($cuestionarios as $cuestionario)
                    <option value="{{$cuestionario["id"]}}">{{$cuestionario["nombre"]}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12">
            <h6>Lista de pacientes</h6>
            <select id="paciente_seleccionado" name="paciente_id" class="form-select" aria-label="Seleccionar un paciente">
                <option disabled selected>Seleccionar un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{$paciente["id"]}}">{{$paciente["name"]}}</option>
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
    $(document).on("change", "#cuestionario_seleccionado,#paciente_seleccionado", function() {
        var cuestionario = $("#cuestionario_seleccionado").val()
        var paciente = $("#paciente_seleccionado").val()
        if(cuestionario && paciente) {
            $("#asignar_submit").removeClass("d-none")
        }
    })
</script>
