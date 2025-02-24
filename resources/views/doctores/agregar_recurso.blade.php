@include("layout.header")
<h4>Tipo de tarea a agregar</h4>
<form method="POST" action="{{ route('users.crear_tarea_doctor') }}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="nombre" class="form-label">Nombre de la tarea</label>
        <input class="form-control" type="text" id="nombre" name="nombre" value="">
    </div>
    <select id="tipo_tarea" class="form-select" aria-label="Selecciona el tipo de tarea">
        <option selected disabled>Selecciona el tipo de tarea</option>
        <option value="documento">Documento</option>
        <option value="video">Video</option>
    </select>
    <div id="documento" class="d-none">
        <input type="file" name="documento_tarea" id="documento_tarea">
    </div>
    <div id="video" class="d-none">
        add video
    </div>
    <div class="mb-3 col-md-12">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>
@include("layout.footer")
<script>
    $(document).on("change", "#tipo_tarea", function(){
        var tipo_tarea = $("#tipo_tarea").val()
        if(tipo_tarea === "video" ) {
            $("#video").removeClass("d-none")
            $("#documento").addClass("d-none")
        } else {
            $("#video").addClass("d-none")
            $("#documento").removeClass("d-none")
        }
    })
</script>
