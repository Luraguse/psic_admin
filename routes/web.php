<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiarioPensamientoController;
use App\Http\Controllers\ComentariosController;

Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('create_register');
Route::post('/register', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::middleware(["auth"])->group(function () {
    Route::get("/users", [UserController::class, 'index'])->name('users.index');
    Route::get("/edit_user/{id}", [UserController::class, 'edit_user'])->name('users.edit_user');
    Route::post("/update_user/{id}", [UserController::class, 'update_user'])->name('users.update_user');
    Route::get("/pacientes", [UserController::class, 'pacientes'])->name('users.pacientes');
    Route::get("/pacientes_doctor", [UserController::class, 'pacientes_doctor'])->name('users.pacientes_doctor');
    Route::get("/paciente/{id}", [UserController::class, 'paciente'])->name('users.paciente');
    Route::get("/asignar_pacientes", [UserController::class, 'asignar_pacientes'])->name('users.asignar_pacientes');
    Route::post("/asignar_paciente", [UserController::class, 'asignar_paciente'])->name('users.asignar_paciente');

# User with ID
    Route::get("/users/{id}", [UserController::class, 'view'])->name('users.view');
    Route::get("/", [UserController::class, 'dashboard'])->name('users.dashboard');
    Route::post("/update_paciente", [UserController::class, 'update'])->name('users.update');

    Route::get("/tareas", [UserController::class, 'tareas_doctor'])->name('users.tareas_doctor');
    Route::get("/agregar_tarea", [UserController::class, 'agregar_tarea_doctor'])->name('users.agregar_tarea_doctor');
    Route::post("/crear_tarea", [UserController::class, 'crear_tarea_doctor'])->name('users.crear_tarea_doctor');

    Route::get("/cuestionarios", [UserController::class, 'cuestionarios_doctor'])->name('users.cuestionarios_doctor');
    Route::get("/cuestionario/{id}", [UserController::class, 'cuestionario_doctor'])->name('users.cuestionario_doctor');
    Route::get("/contestar_cuestionario/{id}", [UserController::class, 'contestar_cuestionario'])->name('users.contestar_cuestionario');
    Route::get("/ver_cuestionario/{cuestionario_id}/{paciente_id}", [UserController::class, 'ver_cuestionario'])->name('users.ver_cuestionario');
    Route::post("/enviar_cuestionario/", [UserController::class, 'enviar_cuestionario'])->name('users.enviar_cuestionario');
    Route::get("/agregar_cuestionario", [UserController::class, 'agregar_cuestionario_doctor'])->name('users.agregar_cuestionario_doctor');
    Route::get("/actualizar_cuestionario/{id}", [UserController::class, 'actualizar_cuestionario_doctor'])->name('users.actualizar_cuestionario_doctor');
    Route::post("/crear_cuestionario", [UserController::class, 'crear_cuestionario_doctor'])->name('users.crear_cuestionario_doctor');
    Route::get("/asignar_cuestionarios", [UserController::class, 'asignar_cuestionarios'])->name('users.asignar_cuestionarios');
    Route::post("/asignar_cuestionario", [UserController::class, 'asignar_cuestionario'])->name('users.asignar_cuestionario');

    # Recursos
    Route::post("/entrada_diario", [DiarioPensamientoController::class, 'entrada_diario'])->name('diario_pensamiento.entrada_diario');

    Route::post("/agregar_comentario_pensamiento/{pensamiento_id}", [ComentariosController::class, "agregar_comentario_pensamiento"])->name('agregar_comentario_pensamiento');
    // Route::post("/update_user/{id}", [UserController::class, 'update_user'])->name('users.update_user');
});
