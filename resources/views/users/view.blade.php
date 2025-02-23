@include("layout.header")
<form method="POST" action="{{ route('users.update') }}">
    @csrf
    <h3 class="text-center">I. Datos Generales</h3>
    <input type="hidden" name="id" value="{{ $user->id }}">
    <div class="row">
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="full_name" class="form-label">1. Nombre completo</label>
            <input class="form-control" type="text" id="full_name" name="full_name" value="{{ $perfil['full_name']??$user->name }}">
        </div>
        <div class="mb-3 col-md-8 col-sm-12">
            <label for="fecha_nacimiento" class="form-label">2. Fecha de nacimiento</label>
            <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{$perfil['fecha_nacimiento']??null}}">
        </div>
        <div class="mb-3 col-md-4 col-sm-12">
            <label for="edad" class="form-label">3. Edad</label>
            <input class="form-control" type="text" id="edad" name="edad" value="{{$perfil['edad']??null}}" readonly>
        </div>
        @if($perfil && $perfil['edad'] < 18)
            @include("users.entrevista_nino")
        @elseif($perfil && $perfil['edad'] >= 18 && $perfil['edad'] < 60)
            @include("users.entrevista_adulto")
        @elseif($perfil && $perfil['edad'] >= 60)
            @include("users.entrevista_adulto_mayor")
        @endif


        <div class="mb-3 col-md-12">
            <button class="btn btn-primary" type="submit">Actualizar</button>
        </div>
    </div>
</form>
@include("layout.footer")
<script>
    $(document).on("change", "#fecha_nacimiento", function() {
        console.log($("#fecha_nacimiento").val());
        var fecha = moment($("#fecha_nacimiento").val(), "YYYY-MM-DD")
        var now = moment();
        var diff = moment.duration(now.diff(fecha))
        $("#edad").val(diff.years())
    });
</script>
