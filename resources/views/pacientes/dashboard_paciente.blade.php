<p>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuestionarios" aria-expanded="false" aria-controls="collapseCuestionarios">
        Cuestionarios
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTareas" aria-expanded="false" aria-controls="collapseTareas">
        Tareas
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDescargas" aria-expanded="false" aria-controls="collapseDescargas">
        Descargas
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiario" aria-expanded="false" aria-controls="collapseDiario">
        Diario de pensamientos
    </button>
    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHistorial" aria-expanded="false" aria-controls="collapseHistorial">
        Historial de sesiones
    </button>
</p>
@include("pacientes.listas.cuestionarios")
@include("pacientes.listas.tareas")
@include("pacientes.listas.descargas")
@include("pacientes.listas.diario")
@include("pacientes.listas.historial")
