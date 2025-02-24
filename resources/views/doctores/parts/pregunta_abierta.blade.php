<li class="list-group-item">
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="abierta_{{$pregunta->id}}" class="form-label">{{$pregunta->pregunta["pregunta"]}}</label>
        <input class="form-control" type="text" id="abierta_{{$pregunta->id}}" name="abierta_{{$pregunta->id}}"
               value="{{$perfil['abierta_'.$pregunta->id]??null}}">
    </div>
</li>
