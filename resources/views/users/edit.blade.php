@include("layout.header")
<form method="POST" action="{{ route('users.update_user', ["id"=>request("id")]) }}">
    @csrf
    <div class="row">
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="name" class="form-label">Nombre del usuario</label>
            <input class="form-control" type="text" id="name" name="name" placeholder="Nombre del usuario" value="{{$user->name}}">
        </div>
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="email" class="form-label">Correo electrónico</label>
            <input class="form-control" type="email" id="email" name="email" placeholder="Correo electrónico" value="{{$user->email}}">
        </div>
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="password" class="form-label">Contraseña</label>
            <input class="form-control" type="password" id="password" name="password" placeholder="Contraseña">
        </div>
        <div class="mb-3 col-md-6 col-sm-12">
            <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña">
        </div>
        <div class="col-12">
            <p id="password_generado"></p>
            <button class="btn btn-success" id="generar_contrasena" type="button">Generar contraseña</button>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Actualizar</button>
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
