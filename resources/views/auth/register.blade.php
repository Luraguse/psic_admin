@include("layout.header")
<h4>Crear usuario</h4>
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="name" class="form-label">Nombre del usuario</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nombre del usuario" value="{{old("name")}}">
        </div>
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="email" class="form-label">Correo electrónico</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Correo electrónico" value="{{old("email")}}">
        </div>
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="password" class="form-label">Contraseña</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña" value="{{old("password")}}">
        </div>
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" value="{{old("password_confirmation")}}">
        </div>
        <div class="col-12">
            <p id="password_generado"></p>
            <button class="btn btn-success" id="generar_contrasena" type="button">Generar contraseña</button>
        </div>
        @if(Auth::check())
            <div class="mb-3 col-md-6 col-sm-12">
                <label for="nivel-usuario" class="">Nivel del usuario</label>
                <select name="nivel" id="nivel-usuario" class="form-select">
                    @if ($count == 0)
                        <option value="admin">Administrador</option>
                    @else
                        @if(Auth::user()->nivel == "admin")
                            <option value="admin">Administrador</option>
                            <option value="doctor" selected>Doctor</option>
                            <option value="paciente">Paciente</option>
                        @else(Auth::user()->nivel == "doctor")
                            <option value="paciente">Paciente</option>
                        @endif

                    @endif
                </select>
            </div>
        @endif
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Registrar</button>
        </div>
    </div>
</form>


@include("layout.footer")
<script>
    function genPassword() {

        var chars = "0123456789abcdefghijklmnopqrstuvwxyz!@#$%^&*()ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var passwordLength = 12;
        var password = "";
        for (var i = 0; i <= passwordLength; i++) {
            var randomNumber = Math.floor(Math.random() * chars.length);
            password += chars.substring(randomNumber, randomNumber + 1);
        }

        $("#password").val(password);
        $("#password_confirmation").val(password);
        $("#password_generado").text(password);
        navigator.clipboard.writeText(password);
        showToast("Se generó la contraseña y se copió al portapapeles", "warning")
    }

    $(document).on("click", "#generar_contrasena", function(){
        genPassword();
    })
</script>
