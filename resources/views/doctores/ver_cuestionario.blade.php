@include("layout.header")
<h6>{{$cuestionario->nombre}}</h6>
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
@include("layout.footer")
