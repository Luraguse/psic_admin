<li class="list-group-item">
    <div class="col-md-6 col-sm-12">
        <p>{{$pregunta->pregunta["pregunta"]}}</i></p>
        @foreach($pregunta->pregunta["opciones"] as $key=>$opcion)
            <div class="form-check">
                @if(array_key_exists("multiple_".strval($pregunta->id)."_".strval($key), $perfil) && $perfil["multiple_".strval($pregunta->id)."_".strval($key)])
                    <input class="form-check-input" type="checkbox" name="multiple_{{$pregunta->id}}_{{$key}}"
                           id="multiple_{{$pregunta->id}}_{{$key}}" value="{{$key}}" checked>
                @else
                    <input class="form-check-input" type="checkbox" name="multiple_{{$pregunta->id}}_{{$key}}"
                           id="multiple_{{$pregunta->id}}_{{$key}}" value="{{$key}}">
                @endif
                <label class="form-check-label" for="multiple_{{$pregunta->id}}_{{$key}}">
                    {{$opcion}}
                </label>
            </div>
        @endforeach
    </div>
</li>
