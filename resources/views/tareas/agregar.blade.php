@include("layout.header")
<form method="POST" action="{{route("tareas.crear")}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="nombre" class="form-label">Nombre</label>
        <input class="form-control" type="text" id="nombre" name="nombre" value="" placeholder="Escriba el nombre de la tarea">
    </div>
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="tarea" class="form-label">Tarea</label>
        <textarea class="form-control" type="text" id="tarea" name="tarea"
                  placeholder="Describa la tarea"></textarea>
    </div>
    <div class="mb-3 col-md-12">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>
@include("layout.footer")
