@include("layout.header")
<form method="POST" action="{{ route('recursos.ligar_recurso') }}">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6>Lista de pacientes</h6>
            <select id="paciente_seleccionado" name="usuario_id" class="form-select" aria-label="Seleccionar un paciente">
                <option disabled selected>Seleccionar un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{$paciente->paciente["id"]}}">{{$paciente->paciente["name"]}} - {{$paciente->paciente["email"]}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12">
            <h6>Lista de recursos ({{$recursos->count()}} total)</h6>
            <select id="recurso_seleccionado" name="recurso_id" class="form-select" aria-label="Seleccionar un recurso">
                <option disabled selected>Seleccionar un recurso</option>
                @foreach($recursos as $recurso)
                    <option value="{{$recurso["id"]}}">{{ucfirst($recurso->tipo)}}: {{$recurso["nombre"]}} <small>({{Str::limit($recurso->descripcion, 50)}})</small></option>
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
    $(document).on("change", "#recurso_seleccionado,#paciente_seleccionado", function() {
        var recurso = $("#recurso_seleccionado").val()
        var paciente = $("#paciente_seleccionado").val()
        if(recurso && paciente) {
            $("#asignar_submit").removeClass("d-none")
        }
    })
</script>
