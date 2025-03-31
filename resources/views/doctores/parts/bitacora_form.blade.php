<form method="POST" action="{{route("bitacora.crear_entrada", ["id"=>request("id")])}}">
    @csrf
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="texto" class="form-label">Agregar una entrada a la bitacora</label>
        <textarea class="form-control" type="text" id="texto" name="texto"
                  placeholder="Agregar texto"></textarea>
    </div>
    <div class="mb-3 col-md-12">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>
