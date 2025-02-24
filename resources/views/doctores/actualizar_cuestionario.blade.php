@include("layout.header")
<h4>Tipo de cuestionario a agregar</h4>
<form method="POST" action="{{ route('users.crear_cuestionario_doctor') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$cuestionario->id??null}}">
    <input type="hidden" name="tipo" id="tipo" value="">
    <div class="mb-3 col-md-12 col-sm-12">
        @if(!isset($cuestionario) or !$cuestionario)
            <label for="nombre" class="form-label">Nombre de la cuestionario</label>
            <input class="form-control" type="text" id="nombre" name="nombre" value="" placeholder="Escriba el nombre del cuestionario">
        @else
            <h6>{{$cuestionario->nombre}}</h6>
        @endif
    </div>
    <div id="abierta" class="d-none">
        <h6>Pregunta abierta</h6>
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="pregunta_abierta" class="form-label">Pregunta</label>
            <input class="form-control" type="text" id="pregunta_abierta" name="pregunta_abierta" value="" placeholder="Escriba la pregunta">
        </div>
    </div>
    <div id="multiple" class="d-none">
        <h6>Pregunta de opción múltiple</h6>
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="pregunta_multiple" class="form-label">Escriba la pregunta</label>
            <input class="form-control" type="text" id="pregunta_multiple" name="pregunta_multiple" value="" placeholder="Escriba la pregunta">
        </div>
        <ul id="opciones" class="list-group">

        </ul>
        <div class="mb-3 col-md-12">
            <button id="agregarOpcion" class="btn btn-success" type="submit">Agregar opción</button>
        </div>
    </div>
    <div id="opcion" class="d-none">
        <h6>Pregunta de una opción</h6>
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="pregunta_opcion" class="form-label">Escriba la pregunta</label>
            <input class="form-control" type="text" id="pregunta_opcion" name="pregunta_opcion" value="" placeholder="Escriba la pregunta">
        </div>
        <ul id="opciones_single" class="list-group">

        </ul>
        <div class="mb-3 col-md-12">
            <button id="agregarOpcionSingle" class="btn btn-success" type="submit">Agregar opción</button>
        </div>
    </div>
    @if(isset($cuestionario) and $cuestionario)
        <div class="mb-3 col-md-12">
            <button id="preguntaAbierta" class="btn btn-success" type="submit">Agregar pregunta abierta</button>
        </div>
        <div class="mb-3 col-md-12">
            <button id="preguntaMultiple" class="btn btn-warning" type="submit">Agregar pregunta opciones múltiples</button>
        </div>
        <div class="mb-3 col-md-12">
            <button id="preguntaOpcion" class="btn btn-danger" type="submit">Agregar pregunta una opción</button>
        </div>
        <div class="mb-3 col-md-12">
            <button class="btn btn-primary right" type="submit">Actualizar</button>
        </div>
    @else
        <div class="mb-3 col-md-12">
            <button class="btn btn-primary right" type="submit">Crear</button>
        </div>
    @endif
</form>

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
<script>
    $(document).on("click", "#preguntaAbierta", function(e){
        e.preventDefault();
        $("#tipo").val("abierta")
        $("#abierta").removeClass("d-none")
        $("#multiple").addClass("d-none")
        $("#opcion").addClass("d-none")
        $("#preguntaAbierta,#preguntaMultiple,#preguntaOpcion").addClass("d-none")
    })
    $(document).on("click", "#preguntaMultiple", function(e){
        e.preventDefault();
        $("#tipo").val("multiple")
        $("#abierta").addClass("d-none")
        $("#multiple").removeClass("d-none")
        $("#opcion").addClass("d-none")
        $("#preguntaAbierta,#preguntaMultiple,#preguntaOpcion").addClass("d-none")
    })
    $(document).on("click", "#preguntaOpcion", function(e){
        e.preventDefault();
        $("#tipo").val("opcion");
        $("#abierta").addClass("d-none")
        $("#multiple").addClass("d-none")
        $("#opcion").removeClass("d-none")
        $("#preguntaAbierta,#preguntaMultiple,#preguntaOpcion").addClass("d-none")
    })
    $(document).on("click", "#agregarOpcion", function(e){
        e.preventDefault();
        var last_li = $("#opciones li").last();
        if(last_li.length > 0) {
            var numero_last_opcion = parseInt(last_li.data("opcion"))
        } else {
            var numero_last_opcion = 0;
        }

        var nuevo_li = `<li data-opcion="${numero_last_opcion+1}" class="list-group-item">
                <div class="mb-3 row">
                    <label for="opcion_${numero_last_opcion+1}" class="col-sm-2 col-form-label">Opcion ${numero_last_opcion+1}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="opcion_${numero_last_opcion+1}" name="opcion_${numero_last_opcion+1}">
                    </div>
                    <p class="col-sm-1 text-center borrar" ><button class="btn btn-danger">X</button></p>
                </div>
            </li>`;
        $("#opciones").append(nuevo_li);
    })
    $(document).on("click", "#agregarOpcionSingle", function(e){
        e.preventDefault();
        var last_li = $("#opciones_single li").last();
        if(last_li.length > 0) {
            var numero_last_opcion = parseInt(last_li.data("opcion"))
        } else {
            var numero_last_opcion = 0
        }


        var nuevo_li = `<li data-opcion="${numero_last_opcion+1}" class="list-group-item">
                <div class="mb-3 row">
                    <label for="opcion_${numero_last_opcion+1}" class="col-sm-2 col-form-label">Opcion ${numero_last_opcion+1}</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="opcion_${numero_last_opcion+1}" name="opcion_${numero_last_opcion+1}">
                    </div>
                    <p class="col-sm-1 text-center borrar" ><button class="btn btn-danger">X</button></p>
                </div>
            </li>`;
        $("#opciones_single").append(nuevo_li);
    })
    $(document).on("click", ".borrar", function(e){
        e.preventDefault();
        $(this).parents('li.list-group-item').remove()
    })
</script>
