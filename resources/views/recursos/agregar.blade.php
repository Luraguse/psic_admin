@include("layout.header")
<form method="POST" action="{{ route('recursos.crear_recurso') }}" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="name" class="form-label">Nombre del recurso</label>
            <input class="form-control" type="text" id="name" name="nombre" placeholder="Nombre del recurso">
        </div>
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="descripcion" class="form-label">Descripción del recurso</label>
            <input class="form-control" type="text" id="descripcion" name="descripcion" placeholder="Descripción del recurso">
        </div>
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="tipo" class="">Tipo de recurso</label>
            <select name="tipo" id="tipo" class="form-select">
                <option disabled selected>Seleccione el tipo de recurso</option>
                <option value="video">Video</option>
                <option value="documento">Documento</option>
            </select>
        </div>
        <div class="upload d-none" id="uploadFile">
            <div class="mb-3">
                <label for="formFile" class="form-label">Subir archivo</label>
                <input class="form-control" type="file" name="file_upload" id="formFile">
            </div>
        </div>
        <div class="upload d-none" id="uploadVideo">
            <div class="mb-3 col-md-12 col-sm-12">
                <label for="video_upload" class="form-label">URL del recurso</label>
                <input class="form-control" type="text" id="video_upload" name="video_upload" placeholder="URL del recurso">
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </div>
</form>
@include("layout.footer")
<script>
    $(document).on("change", "#tipo", function(){
        var tipo = $(this).val()
        $(".upload").addClass("d-none");
        if(tipo === "video") {
            $("#uploadVideo").removeClass("d-none");
            $("#uploadFile").val(null);
        } else if(tipo === "documento") {
            $("#uploadFile").removeClass("d-none");
            $("#uploadVideo").val(null);
        }
    });
</script>
