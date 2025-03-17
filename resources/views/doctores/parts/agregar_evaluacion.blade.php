<form class="mt-5" method="POST" action="{{route("evaluar.agregar_evaluacion", ["id"=>request("id")])}}">
    @csrf
    <input type="hidden" name="tipo" value="{{$tipo??null}}">
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="evaluacion" class="form-label">Evaluación</label>
        <textarea class="form-control" type="text" id="evaluacion" name="evaluacion"
                  placeholder="Agregar una evaluación"></textarea>
    </div>
    <div class="mb-3">
        <button class="btn btn-success btn-sm" type="submit">Guardar evaluación</button>
    </div>
</form>
