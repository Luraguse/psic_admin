@include("layout.header")
<h4>{{$tarea_paciente->tarea->nombre}}</h4>
<p>Tarea: {{$tarea_paciente->tarea->tarea}}</p>
@if($tarea_paciente->terminado)
    <div class="row">
        <div class="col-md-2 col-sm-3">Respuesta:</div>
        <div class="col-md-10 col-sm-9">{{$tarea_paciente->respuesta}}</div>
        @if($tarea_paciente->recurso)
            <div class="col-md-2 col-sm-3">Recurso:</div>
            <div class="col-md-10 col-sm-9"><a class="btn btn-sm btn-primary" href="{{route("tareas.descargar", ["id"=>$tarea_paciente->id])}}" target="_blank">Descargar</a></div>
        @endif
    </div>
    @if(!is_null($tarea_paciente->evaluacion))
        <div class="mt-4">
            <h4 class="text-center">Evaluación</h4>
            <p>{{$tarea_paciente->evaluacion->evaluacion}}</p>
        </div>
    @else
        @if($tarea_paciente->terminado && (Auth::user()->nivel == "doctor" || Auth::user()->nivel=="admin"))
            @include("doctores.parts.agregar_evaluacion", ["tipo"=>"tarea"])
        @endif
    @endif
@else
    <form method="POST" action="{{ route('tareas.actualizar', ["id"=>$tarea_paciente->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 col-md-12 col-sm-12">
            <label for="respuesta" class="form-label">Respuesta</label>
            <input class="form-control" type="text" id="respuesta" name="respuesta" value="" placeholder="Escriba la respuesta de la tarea">
        </div>
        <div class="upload" id="uploadFile">
            <div class="mb-3">
                <label for="formFile" class="form-label">Subir archivo** (opcional)</label>
                <input class="form-control" type="file" name="file_upload" id="formFile">
            </div>
        </div>
        <div class="mb-3 col-md-12">
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>
@endif

@include("layout.footer")
