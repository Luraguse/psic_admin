@include("layout.header")
<form method="POST" action="{{ route('tareas.asignar') }}">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6>Lista de pacientes</h6>
            <select id="paciente_seleccionado" name="paciente_id" class="form-select" aria-label="Seleccionar un paciente">
                <option disabled selected>Seleccionar un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{$paciente->paciente["id"]}}">{{$paciente->paciente["name"]}} - {{$paciente->paciente["email"]}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12">
            <h6>Lista de tareas ({{$tareas->count()}} total)</h6>
            <select id="tarea_seleccionada" name="id_tarea" class="form-select" aria-label="Seleccionar un tarea">
                <option disabled selected>Seleccionar un tarea</option>
                @foreach($tareas as $tarea)
                    <option value="{{$tarea["id"]}}">{{$tarea->nombre}} <small>({{Str::limit($tarea->tarea, 50)}})</small></option>
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
    $(document).on("change", "#tarea_seleccionada,#paciente_seleccionado", function() {
        var tarea = $("#tarea_seleccionada").val()
        var paciente = $("#paciente_seleccionado").val()
        if(tarea && paciente) {
            $("#asignar_submit").removeClass("d-none")
        }
    })
</script>
