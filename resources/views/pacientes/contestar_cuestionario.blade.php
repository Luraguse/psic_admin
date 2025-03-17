@include("layout.header")
<h4>Cuestionario: {{$cuestionario->nombre}}</h4>
<form method="POST" action="{{ route('users.enviar_cuestionario') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="cuestionario_paciente_id" value="{{request("id")}}">
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
        @if((Auth::user()->nivel=="paciente" && !$cuestionario_paciente->terminado) || ((Auth::user()->nivel=="doctor" || Auth::user()->nivel=="admin") && !$cuestionario_paciente->evaluacion??null))
            @if((Auth::user()->nivel == "doctor" || Auth::user()->nivel=="admin") && $cuestionario_paciente->terminado)
                <button class="btn btn-danger" type="submit">Actualizar</button>
            @else
                <button class="btn btn-primary" type="submit">Guardar</button>
            @endif
        @endif
    </div>
</form>
@if(!is_null($cuestionario_paciente->evaluacion))
    <div class="mt-4">
        <h4 class="text-center">Evaluación</h4>
        <p>{{$cuestionario_paciente->evaluacion->evaluacion}}</p>
    </div>
@else
    @if($cuestionario_paciente->terminado && (Auth::user()->nivel == "doctor" || Auth::user()->nivel=="admin"))
        @include("doctores.parts.agregar_evaluacion", ["tipo"=>"cuestionario"])
    @endif
@endif

@include("layout.footer")
