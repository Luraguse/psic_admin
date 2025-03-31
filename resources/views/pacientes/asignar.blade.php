@include("layout.header")
<h4>Asignar Pacientes</h4>
<form method="POST" action="{{ route('users.asignar_paciente') }}">
    @csrf
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <h6>Lista de pacientes</h6>
            <select id="paciente_seleccionado" name="paciente_id" class="form-select" aria-label="Seleccionar un paciente">
                <option disabled selected>Seleccionar un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{$paciente["id"]}}">{{$paciente["name"]}} - {{$paciente["email"]}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 col-sm-12">
            <h6>Lista de doctores</h6>
            <select id="doctor_seleccionado" name="doctor_id" class="form-select" aria-label="Seleccionar un doctor">
                <option disabled selected>Seleccionar un doctor</option>
                @foreach($doctores as $doctor)
                    <option value="{{$doctor["id"]}}">{{$doctor["name"]}} - {{ $doctor["email"] }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button id="asignar_submit" class="btn btn-primary d-none" type="submit">Asignar</button>
        </div>
    </div>
</form>
<div>
    <h4>Pacientes asignados</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre paciente</th>
                <th>Email paciente</th>
                <th>Doctor asignado</th>
                <th>Acción</th>
            </tr>
        </thead>
        @foreach($lista_pacientes as $paciente)
            <tr>
                <td>{{$paciente["paciente"]->name}}</td>
                <td>{{$paciente["paciente"]->email}}</td>
                <td colspan="2">
                    <div class="row">
                        @foreach($paciente["doctores"] as $doctor)
                            <div class="col-sm-9 col-md-9">
                                {{$doctor->name}}
                            </div>
                            <div class="col-sm-3 col-md-3">
                                <form method="POST"
                                      action="{{route("users.quitar_doctor", ["id"=>$paciente["paciente"]->id])}}">
                                    @csrf

                                    <a class="btn btn-danger btn-sm quitar_doctor mt-2" href="">Quitar</a>
                                </form>
                            </div>
                        @endforeach
                    </div>


                </td>
                <td>
                </td>
            </tr>
        @endforeach
    </table>
</div>

@include("layout.footer")
<script>
    $(document).on("change", "#paciente_seleccionado,#doctor_seleccionado", function() {
        var paciente = $("#paciente_seleccionado").val()
        var doctor = $("#doctor_seleccionado").val()
        if(paciente && doctor) {
            $("#asignar_submit").removeClass("d-none")
        }
    })
    $(document).on("click", ".quitar_doctor", function(e){
        e.preventDefault()
        var confirmar = confirm("Se desasociará el doctor del paciente, ¿desea continuar?");

        if(!confirmar) {

            return false;
        }
        var form = $(this).parent();
        form.submit();
    })
</script>
