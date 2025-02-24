@include("layout.header")
<h4>Cuestionario: {{$cuestionario->nombre}}</h4>
<form method="POST" action="{{ route('users.enviar_cuestionario') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="cuestionario_id" value="{{$cuestionario->id}}">
    <ul class="list-group">
        @foreach($preguntas as $pregunta)
            @if($pregunta->pregunta["tipo"] == "abierta")
                @include("doctores.parts.pregunta_abierta")
            @elseif($pregunta->pregunta["tipo"] == "multiple")
                @include("doctores.parts.pregunta_multiple")
            @elseif($pregunta->pregunta["tipo"] == "opcion")
                @include("doctores.parts.pregunta_opcion")
            @endif
        @endforeach
    </ul>
    <div class="mb-3 col-md-12">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>
@include("layout.footer")
