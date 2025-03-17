@include("layout.header")
<h3 class="text-center">
    Paciente: {{ $perfil['full_name']??"No se ha registrado el nombre completo en expediente" }}</h3>
<div class="accordion" id="accordionUsuario">
    <div class="btn-group accordion-header">

        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseExpediente" aria-expanded="true" aria-controls="collapseExpediente">
            Expediente
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseDiario" aria-expanded="false" aria-controls="collapseDiario">
            Diario de pensamientos
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseRecursos" aria-expanded="false" aria-controls="collapseRecursos">
            Recursos
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseCuestionarios" aria-expanded="false" aria-controls="collapseCuestionarios">
            Cuestionarios
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseTareas" aria-expanded="false" aria-controls="collapseTareas">
            Tareas
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapseHistorial" aria-expanded="false" aria-controls="collapseHistorial">
            Historial
        </button>
    </div>
    <div class="accordion-item col-md-12">
        <div class="row accordion-collapse collapse" id="collapseExpediente" data-bs-parent="#accordionUsuario">
            <div class="accordion-body">
                <h3 class="text-center">I. Datos Generales</h3>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="full_name" class="form-label">1. Nombre completo</label>
                    <input readonly class="form-control" type="text" id="full_name" name="full_name"
                           value="{{ $perfil['full_name']??null }}">
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="fecha_nacimiento" class="form-label">2. Fecha de nacimiento</label>
                    <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento"
                           value="{{$perfil['fecha_nacimiento']??null}}">
                </div>
                <div class="mb-3 col-md-4 col-sm-12">
                    <label for="edad" class="form-label">3. Edad</label>
                    <input class="form-control" type="text" id="edad" name="edad" value="{{$perfil['edad']??null}}"
                           readonly>
                </div>
                @if($perfil)
                    @if($perfil && $perfil['edad'] < 18)
                        @include("users.perfil_nino")
                    @elseif($perfil && $perfil['edad'] >= 18 && $perfil['edad'] < 60)
                        @include("users.perfil_adulto")
                    @elseif($perfil && $perfil['edad'] >= 60)
                        @include("users.perfil_adulto_mayor")
                    @endif
                @else
                    <h4>No se ha generado perfil</h4>
                @endif
                @if(Auth::user()->nivel=="doctor" || Auth::user()->nivel=="admin")
                    <a class="btn btn-sm btn-primary" href="{{route("users.view", ["id"=>$paciente->id])}}">Actualizar perfil</a>
                @endif
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <div id="collapseDiario" class="accordion-collapse collapse" data-bs-parent="#accordionUsuario">
            @include("pacientes.listas.diario")
        </div>
    </div>
    <div class="accordion-item">
        <div id="collapseRecursos" class="accordion-collapse collapse" data-bs-parent="#accordionUsuario">
            @include("pacientes.listas.recursos")
        </div>
    </div>
    <div class="accordion-item">
        <div id="collapseCuestionarios" class="accordion-collapse collapse" data-bs-parent="#accordionUsuario">
            @include("pacientes.listas.cuestionarios")
        </div>
    </div>
    <div class="accordion-item">
        <div id="collapseTareas" class="accordion-collapse collapse" data-bs-parent="#accordionUsuario">
            @include("pacientes.listas.tareas")
        </div>
    </div>
    <div class="accordion-item">
        <div id="collapseHistorial" class="accordion-collapse collapse" data-bs-parent="#accordionUsuario">
            @include("pacientes.listas.historial")
        </div>
    </div>
</div>


{{--<p>--}}
{{--    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePerfil" aria-expanded="false" aria-controls="collapsePerfil">--}}
{{--        Mostrar expediente--}}
{{--    </button>--}}
{{--    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiario" aria-expanded="false" aria-controls="collapseDiario">--}}
{{--        Mostrar diario de pensamientos--}}
{{--    </button>--}}
{{--    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePerfil" aria-expanded="false" aria-controls="collapsePerfil">--}}
{{--        Mostrar tareas--}}
{{--    </button>--}}
{{--    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuestionarios" aria-expanded="false" aria-controls="collapseCuestionarios">--}}
{{--        Mostrar cuestionarios--}}
{{--    </button>--}}
{{--</p>--}}
{{--<div class="row collapse" id="collapsePerfil">--}}
{{--    <h3 class="text-center">I. Datos Generales</h3>--}}
{{--    <div class="mb-3 col-md-12 col-sm-12">--}}
{{--        <label for="full_name" class="form-label">1. Nombre completo</label>--}}
{{--        <input readonly class="form-control" type="text" id="full_name" name="full_name" value="{{ $perfil['full_name']??null }}">--}}
{{--    </div>--}}
{{--    <div class="mb-3 col-md-8 col-sm-12">--}}
{{--        <label for="fecha_nacimiento" class="form-label">2. Fecha de nacimiento</label>--}}
{{--        <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$perfil['fecha_nacimiento']??null}}">--}}
{{--    </div>--}}
{{--    <div class="mb-3 col-md-4 col-sm-12">--}}
{{--        <label for="edad" class="form-label">3. Edad</label>--}}
{{--        <input class="form-control" type="text" id="edad" name="edad" value="{{$perfil['edad']??null}}" readonly>--}}
{{--    </div>--}}
{{--    @if($perfil)--}}
{{--        @if($perfil && $perfil['edad'] < 18)--}}
{{--            @include("users.perfil_nino")--}}
{{--        @elseif($perfil && $perfil['edad'] >= 18 && $perfil['edad'] < 60)--}}
{{--            @include("users.perfil_adulto")--}}
{{--        @elseif($perfil && $perfil['edad'] >= 60)--}}
{{--            @include("users.perfil_adulto_mayor")--}}
{{--        @endif--}}
{{--    @else--}}
{{--        <h4>No se ha generado perfil</h4>--}}
{{--    @endif--}}
{{--</div>--}}
{{--@include("pacientes.listas.diario")--}}
{{--@include("pacientes.listas.cuestionarios")--}}
@include("layout.footer")
<script>
    $(document).on("click", "input[type='radio'], input[type='checkbox'], input", function () {
        return false;
    })
</script>
