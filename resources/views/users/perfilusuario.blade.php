@include("layout.header")
<h3 class="text-center">Datos del paciente {{ $perfil['full_name']??null }}</h3>
<p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePerfil" aria-expanded="false" aria-controls="collapsePerfil">
        Mostrar perfil
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePerfil" aria-expanded="false" aria-controls="collapsePerfil">
        Mostrar diario de sesiones
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePerfil" aria-expanded="false" aria-controls="collapsePerfil">
        Mostrar tareas
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePerfil" aria-expanded="false" aria-controls="collapsePerfil">
        Mostrar cuestionarios
    </button>
</p>
<div class="row collapse" id="collapsePerfil">
    <h3 class="text-center">I. Datos Generales</h3>
    <div class="mb-3 col-md-12 col-sm-12">
        <label for="full_name" class="form-label">1. Nombre completo</label>
        <input readonly class="form-control" type="text" id="full_name" name="full_name" value="{{ $perfil['full_name']??null }}">
    </div>
    <div class="mb-3 col-md-8 col-sm-12">
        <label for="fecha_nacimiento" class="form-label">2. Fecha de nacimiento</label>
        <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$perfil['fecha_nacimiento']??null}}">
    </div>
    <div class="mb-3 col-md-4 col-sm-12">
        <label for="edad" class="form-label">3. Edad</label>
        <input class="form-control" type="text" id="edad" name="edad" value="{{$perfil['edad']??null}}" readonly>
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
</div>
@include("layout.footer")
<script>
$(document).on("click", "input[type='radio'], input[type='checkbox'], input", function(){
    return false;
})
</script>
