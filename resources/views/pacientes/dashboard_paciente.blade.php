<div class="accordion" id="accordionUsuario">
    <div class="btn-group accordion-header">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseDiario" aria-expanded="false" aria-controls="collapseDiario">
            Diario de pensamientos
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRecursos" aria-expanded="false" aria-controls="collapseRecursos">
            Recursos
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuestionarios" aria-expanded="false" aria-controls="collapseCuestionarios">
            Cuestionarios
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTareas" aria-expanded="false" aria-controls="collapseTareas">
            Tareas
        </button>
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHistorial" aria-expanded="false" aria-controls="collapseHistorial">
            Historial
        </button>
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
</div>
