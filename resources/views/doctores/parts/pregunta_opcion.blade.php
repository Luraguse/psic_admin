<li class="list-group-item">
    <div class="col-md-6 col-sm-12">
        <p>{{$pregunta->pregunta["pregunta"]}}</i></p>
        @foreach($pregunta->pregunta["opciones"] as $key=>$opcion)
            <div class="form-check">
                @if(array_key_exists("opcion_".strval($pregunta->id), $perfil) && strval($key) == $perfil["opcion_".strval($pregunta->id)])
                    <input class="form-check-input" type="radio" name="opcion_{{$pregunta->id}}"
                           id="opcion_{{$pregunta->id}}" value="{{$key}}" checked>
                @else
                    <input class="form-check-input" type="radio" name="opcion_{{$pregunta->id}}"
                           id="opcion_{{$pregunta->id}}" value="{{$key}}">
                @endif
                <label class="form-check-label" for="opcion_{{$pregunta->id}}">
                    {{$opcion}}
                </label>
            </div>
        @endforeach
    </div>
</li>
