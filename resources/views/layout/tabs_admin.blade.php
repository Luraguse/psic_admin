<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/register">Crear usuario</a>
</li>
@if(Auth::user()->nivel == "admin")
<li class="nav-item">
    <a class="nav-link" href="/asignar_pacientes">Asignar pacientes</a>
</li>
@endif
<li class="nav-item">
    <a class="nav-link" href="/pacientes">Pacientes</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/doctores">Doctores</a>
</li>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/cuestionarios">Cuestionarios</a>
</li>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/recursos">Recursos</a>
</li>
<li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/tareas">Tareas</a>
</li>
