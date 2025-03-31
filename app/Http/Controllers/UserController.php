<?php

namespace App\Http\Controllers;

use App\Models\HistorialSesion;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Cuestionario;
use App\Models\CuestionarioPaciente;
use App\Models\CuestionarioPregunta;
use App\Models\DiarioPensamiento;
use App\Models\RecursoUsuario;
use App\Models\Tarea;
use App\Models\TareaPaciente;
use App\Models\PacienteDoctor;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        // Get count of existing users
        $count = User::select()->count();
        if ($count > 0 && !Auth::check()) {
            return redirect('/login');
        }
        if ($count == 0) {
            return view('auth.register', ["user" => null, "count" => 0]);
        }
        $user = Auth::user();
        return view('auth.register', ["user" => $user, "count" => $count]);

    }

    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        if (Auth::user()->nivel == "paciente") {
            $cuestionarios_paciente = CuestionarioPaciente::with("cuestionario")->where("paciente_id", "=", Auth::id())->get()->sortByDesc("created_at");
            $diario_pensamientos = DiarioPensamiento::with(["usuario", "comentarios"])->where("paciente_id", "=", Auth::id())->get()->sortByDesc("created_at");
            $recursos_usuario = RecursoUsuario::with("recurso")->where("usuario_id", Auth::id())->get()->sortByDesc("created_at");
            $tareas_paciente = TareaPaciente::with(["tarea"])->where("paciente_id", Auth::id())->get()->sortByDesc("created_at");
            $mensajes = HistorialSesion::all()->where("paciente_id", "=", Auth::id())->sortByDesc("created_at");
            return view("dashboard", compact("cuestionarios_paciente", "diario_pensamientos", "recursos_usuario", "tareas_paciente", "mensajes"));
        }
        return view('dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ],
            [
                'name.required' => 'El campo nombre es obligatorio',
                'email.required' => 'El campo email es obligatorio',
                'email.email' => 'El campo email debe ser un email',
                'email.unique' => 'El email ya existe',
                'password.required' => 'El campo password es obligatorio',
                'password.min' => 'El campo password debe tener al menos 6 caracteres',
            ]);
        // If not valid, return error

        $count = User::select()->count();
        if ($count == 0) {
            $nivel = "admin";
        } else {
            if (Auth::check()) {
                $nivel = $request->nivel;
            } else {
                $nivel = "paciente";
            }

        }
        $new_user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "nivel" => $nivel,
        ];
        $user_created = User::create($new_user);
        # Get new User ID
        if (!Auth::check()) {
            return redirect('/login')->with('success', 'Se registró correctamente, por favor inicie sesión.');
        }

        return redirect()->route("create_register")->with("success", "Usuario creado exitosamente");
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->nivel == "paciente" && !Auth::user()->doctor_id) {
                Auth::logout();
                return redirect('/login')->with('error', 'Este usuario aún no ha sido aprobado');
            }
            return redirect()->intended('/');
        }

        return redirect('/login')->with('error', 'Invalid credentials. Please try again.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }

    public function index()
    {

    }

    public function edit_user(int $id)
    {
        $user = User::all()->where("id", $id)->first();
        if (Auth::user()->nivel == "paciente") {
            if ($user->id != Auth::id()) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
        } else if (Auth::user()->nivel == "doctor") {
            if ($user->nivel == "admin" or ($user->nivel == "doctor" and $user->id != Auth::id())) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
            if ($user->nivel == "paciente" && $user->doctor_id != Auth::id()) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
        }
        return view("users.edit", ["user" => $user]);
    }

    public function update_user(Request $request, int $id)
    {
        $user = User::all()->where("id", $id)->first();
        $nivel_usuario = Auth::user()->nivel;
        if ($nivel_usuario == "paciente") {
            if ($user->id != Auth::id()) {
                return redirect("/")->with("error", "No tienes permiso para acceder a este recurso");
            }
        } else if ($nivel_usuario == "doctor") {
            if ($user->nivel == "admin" or ($user->nivel == "doctor" and $user->id != Auth::id())) {
                return redirect("/")->with("error", "No tienes permiso para acceder a este recurso");
            }
            if ($user->nivel == "paciente" && $user->doctor_id != Auth::id()) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
        }

        if (!$request->all()["password"] and !$request->all()["password_confirmation"]) {
            $request->validate([
                'name' => 'required|min:6',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ],
                [
                    'name.required' => 'El campo nombre es obligatorio',
                    'name.min' => 'El campo nombre tiene que tener al menos 6 caracteres',
                    'email.required' => 'El campo email es obligatorio',
                    'email.email' => 'El campo email debe ser un email',
                    'email.unique' => 'El email ya existe',
                ]);
            $user->name = $request["name"];
            $user->email = $request["email"];
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'required|confirmed|min:6',
            ],
                [
                    'name.required' => 'El campo nombre es obligatorio',
                    'email.required' => 'El campo email es obligatorio',
                    'email.email' => 'El campo email debe ser un email',
                    'email.unique' => 'El email ya existe',
                    'password.required' => 'El campo password es obligatorio',
                    'password.min' => 'El campo password debe tener al menos 6 caracteres',
                ]);
            $user->name = $request["name"];
            $user->email = $request["email"];
            $user->password = Hash::make($request["password"]);
        }
        $user->save();
        return redirect()->route("users.edit_user", ["id" => $user->id])->with("success", "Usuario actualizado correctamente");
    }

    public function view(int $id)
    {
        $user = User::first()->find($id);
        if ($user == null) {
            return redirect('/')->with('error', 'No se encontro el usuario.');
        }
        if ($user->nivel == "paciente") {
            if (Auth::user()->nivel == "paciente" && Auth::user()->id != $id) {
                return redirect("/")->with('error', 'No tienes permiso para ver este usuario.');
            }
            if (Auth::user()->nivel == "doctor") {
                $paciente_asignado = PacienteDoctor::where("doctor_id", Auth::id())->where("paciente_id", $id)->count();
                if ($paciente_asignado == 0) {
                    return redirect("/")->with('error', 'No tienes permiso para ver este usuario.');
                }
            }
            $info_paciente = Perfil::all()->where("user_id", $user->id)->first();
            if ($info_paciente !== null) {
                $info_paciente = json_decode($info_paciente->perfil, true);
            }
            $doctor_asignado = null;
            if (!$user->doctor_id) {
                $lista_doctores = null;
            }
            return view('users.view', ["user" => $user, "perfil" => $info_paciente, "doctor_asignado" => $doctor_asignado]);
        }
        return view('users.view', ["user" => $user]);
    }

    public function pacientes()
    {
        $lista_pacientes = [];
        $lista_pacientes_sin_asignar = [];
        if(Auth::user()->nivel == "admin") {
            $pacientes = PacienteDoctor::get()->pluck("paciente_id")->toArray();
            $pacientes_doctores = PacienteDoctor::with(["doctor", "paciente"])->whereIn("paciente_id", $pacientes)->get();
            $lista_pacientes_sin_asignar = User::where("nivel", "paciente")->whereNotIn("id", $pacientes)->get();
            foreach($pacientes_doctores as $paciente) {
                if(!array_key_exists($paciente->paciente_id, $lista_pacientes)) {
                    $lista_pacientes[$paciente->paciente_id] = ["paciente" => $paciente->paciente, "doctores" => [$paciente->doctor]];
                } else {
                    $lista_pacientes[$paciente->paciente_id]["doctores"][] = $paciente->doctor;
                }
            }
        } elseif(Auth::user()->nivel == "doctor") {
            $pacientes = PacienteDoctor::where("doctor_id", Auth::id())->get()->pluck("paciente_id")->toArray();
            $pacientes_doctores = PacienteDoctor::with(["doctor", "paciente"])->whereIn("paciente_id", $pacientes)->get();
            foreach($pacientes_doctores as $paciente) {
                if(!array_key_exists($paciente->paciente_id, $lista_pacientes)) {
                    $lista_pacientes[$paciente->paciente_id] = ["paciente" => $paciente->paciente, "doctores" => [$paciente->doctor]];
                } else {
                    $lista_pacientes[$paciente->paciente_id]["doctores"][] = $paciente->doctor;
                }
            }

        } else {
            return redirect('/')->with('error', 'No tienes permiso para acceder a este recurso');
        }
        return view('users.pacientes', compact("lista_pacientes", "lista_pacientes_sin_asignar"));
    }

    public function doctores()
    {
        $pacientes = User::all()->where('nivel', 'paciente');
        $doctores = User::all()->where('nivel', 'doctor');
        $lista_pacientes = [];
        foreach ($pacientes as $paciente) {
            if (!$paciente->doctor_id) {
                continue;
            }
            if (!array_key_exists($paciente->doctor_id, $lista_pacientes)) {
                $lista_pacientes[$paciente->doctor_id] = [];
            }
            $lista_pacientes[$paciente->doctor_id][] = $paciente;
        }
        return view('users.doctores', ["doctores" => $doctores, 'lista_pacientes' => $lista_pacientes]);
    }

    public function doctor(int $id)
    {
        $pacientes = User::all()->where('nivel', 'paciente')->where("doctor_id", $id);
        return view("users.doctor", ["pacientes" => $pacientes]);
    }

    public function pacientes_doctor()
    {
        $doctor = Auth::user();
        if ($doctor->nivel != "doctor") {
            return redirect("/")->with('error', 'No tienes permiso para ver esta sección.');
        }
        $pacientes = PacienteDoctor::with(["paciente", "doctor"])->where("doctor_id", Auth::id())->get();
        return view('doctores.lista_pacientes', ["pacientes" => $pacientes]);
    }

    public function paciente(int $id)
    {
        if(Auth::user()->nivel == "doctor") {
            $paciente = PacienteDoctor::with(["paciente", "doctor"])->where("paciente_id", $id)->where("doctor_id", Auth::id())->first();
        } elseif(Auth::user()->nivel == "admin") {
            $paciente = PacienteDoctor::with(["paciente", "doctor"])->where("paciente_id", $id)->first();
        }

        if ($paciente == null) {
            return redirect('/')->with('error', 'No se encontro el paciente.');
        }
        if (Auth::user()->nivel == "paciente" && Auth::user()->id != $id) {
            return redirect("/")->with('error', 'No tienes permiso para ver este usuario.');
        }
        if (Auth::user()->nivel == "doctor" && $paciente->doctor_id != Auth::id()) {
            return redirect("/")->with('error', 'No tienes permiso para ver este usuario.');
        }
        if ($paciente->paciente->nivel == "paciente") {
            $perfil = Perfil::all()->where("user_id", $paciente->paciente_id)->first();
            if ($perfil !== null) {
                $perfil = json_decode($perfil->perfil, true);
            }
            $diario_pensamientos = DiarioPensamiento::with(["usuario", "comentarios"])->where("paciente_id", $paciente->paciente->id)->get()->sortByDesc("created_at");
            $cuestionarios_paciente = CuestionarioPaciente::with(["cuestionario", "evaluacion"])->where("paciente_id", "=", $paciente->paciente->id)->get()->sortByDesc("created_at");
            $recursos_usuario = RecursoUsuario::with("recurso")->where("usuario_id", $paciente->paciente->id)->get()->sortByDesc("created_at");
            $tareas_paciente = TareaPaciente::with(["doctor", "tarea", "evaluacion"])->where("paciente_id", $paciente->paciente->id)->get()->sortByDesc("created_at");
            $mensajes = HistorialSesion::all()->where("paciente_id", "=", $paciente->paciente->id)->sortByDesc("created_at");
            $bitacoras = Bitacora::all()->where("paciente_id", "=", $paciente->paciente->id)->sortByDesc("created_at");
            // ["paciente" => $paciente, "perfil" => $perfil, "diario_pensamientos" => $diario_pensamientos, "cuestionarios_paciente" => $cuestionarios_paciente, "paciente_id"=>$paciente->id, "recursos_usuario" => $recursos_usuario]
            return view('users.perfilusuario', compact("paciente", "perfil", "diario_pensamientos", "cuestionarios_paciente", "recursos_usuario", "tareas_paciente", "mensajes", "bitacoras"));
        } else {
            return redirect('/')->with('error', 'El usuario no es paciente.');
        }
    }

    public function doctors(Request $request)
    {
        $doctors = User::all()->where('nivel', 'doctor');
        # check if json response or html
        $lista_doctores = [];
        foreach ($doctors as $doctor) {
            $lista_doctores[$doctor->id] = $doctor->name;
        }
        if ($request->ajax()) {
            return response()->json(["doctors" => $lista_doctores]);
        }
        return view('users.doctors', ["doctors" => $lista_doctores]);
    }

    public function update(Request $request)
    {
        $perfil_existente = Perfil::all()->where("user_id", $request->all()["id"])->first();
        if ($perfil_existente == null) {
            $request->validate([
                'full_name' => 'required',
                'fecha_nacimiento' => 'required|date',
            ],
                [
                    'full_name.required' => 'El campo nombre es obligatorio',
                    'fecha_nacimiento.required' => 'El campo de fecha de nacimiento es obligatorio',
                    'fecha_nacimiento.date' => 'El campo de fecha  de nacimiento debe tener el formato AAAA-MM-DD',
                ]);
            // If valid create perfil usuario
            $perfil = json_encode([
                "user_id" => $request->all()["id"],
                "full_name" => $request->all()["full_name"],
                "fecha_nacimiento" => $request->all()["fecha_nacimiento"],
                "edad" => $request->all()["edad"],
                "guardado" => false,
            ]);
            $new_perfil = [
                "user_id" => $request->all()["id"],
                "perfil" => $perfil
            ];
            $perfil_created = Perfil::create($new_perfil);
            if ($perfil_created) {
                return redirect()->route("users.view", ['id' => $perfil_created->user_id])->with("success", "Perfil creado exitosamente");
            }
        } else {
            // Remove _token and id from request variables
            $request->request->add(["guardado" => true]);
            $perfil = json_encode($request->all());
            $perfil_existente->update(["perfil" => $perfil]);
            $perfil_existente->save();
            return redirect()->route("users.view", ['id' => $perfil_existente->user_id])->with("success", "Perfil actualizado exitosamente");
        }

        return redirect()->route("users.view", ['id' => $request->all()["id"]]);
    }

    public function asignar_pacientes()
    {
        if (Auth::user()->nivel != "admin") {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta seccion');
        }
        $lista_pacientes = [];
        $doctores = User::all()->where('nivel', 'doctor');

        $pacientes = User::all()->where('nivel', 'paciente');
        $pacientes_ids = PacienteDoctor::get()->pluck("paciente_id")->toArray();
        $pacientes_doctores = PacienteDoctor::with(["doctor", "paciente"])->whereIn("paciente_id", $pacientes_ids)->get();
        foreach($pacientes_doctores as $paciente) {
            if(!array_key_exists($paciente->paciente_id, $lista_pacientes)) {
                $lista_pacientes[$paciente->paciente_id] = ["paciente" => $paciente->paciente, "doctores" => [$paciente->doctor]];
            } else {
                $lista_pacientes[$paciente->paciente_id]["doctores"][] = $paciente->doctor;
            }
        }
        return view('pacientes.asignar', compact('lista_pacientes', 'doctores', 'pacientes'));
    }

    public function quitar_doctor(int $id)
    {
        $paciente = User::all()->findOrFail($id);
        $paciente->doctor_id = null;
        $paciente->save();
        return redirect()->route("users.asignar_pacientes")->with("success", "Se desasoció el doctor correctamente");
    }

    public function asignar_paciente(Request $request)
    {
        if (Auth::user()->nivel != "admin") {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta seccion');
        }
        // Validate that paciente_id and doctor_id combination doesn't exists
        $paciente_doctor = PacienteDoctor::all()->where("paciente_id", $request->all()["paciente_id"])->where("doctor_id", $request->all()["doctor_id"])->count();
        if ($paciente_doctor == 0) {
            $pd = [
                "paciente_id" => $request->all()["paciente_id"],
                "doctor_id" => $request->all()["doctor_id"],
            ];
            $new_paciente_doctor = PacienteDoctor::create($pd);
            if ($new_paciente_doctor) {
                return redirect()->back()->with("success", "Se asignó el paciente con éxito");
            }
        } else {
            return redirect()->back()->with("error", "Ya está registardo el paciente con el doctor");
        }
        return redirect()->back()->with("error", "Ocurrió un error al intentar asignar al paciente");
//        $paciente = User::all()->where('id', $request->all()["paciente_id"])->where("nivel", "paciente")->first();
//        if ($paciente == null) {
////            return view("users.asignar_pacientes")->with("error", "El paciente no existe");
//            return redirect()->route("users.asignar_pacientes")->with("error", "El paciente no existe");
//        }
//        $doctor = User::all()->where('id', $request->all()["doctor_id"])->where("nivel", "doctor")->first();
//        if ($doctor == null) {
////            return view("users.asignar_pacientes")->with("error", "El doctor no existe");
//            return redirect()->route("users.asignar_pacientes")->with("error", "El doctor no existe");
//        }
//        $paciente->doctor_id = $request->all()["doctor_id"];
//        $paciente->save();
////        return view("users.asignar_pacientes")->with("success", "Paciente actualizado exitosamente");
//        return redirect()->route("users.asignar_pacientes")->with("success", "Paciente actualizado exitosamente");
    }

    public function tareas_doctor()
    {
        $tareas = Tarea::all()->where('doctor_id', 'is', Auth::user()->id);
        return view("doctores.lista_tareas", ["tareas" => $tareas]);
    }

    public function agregar_tarea_doctor()
    {
        return view("doctores.agregar_tarea");
    }

    public function crear_tarea_doctor()
    {

    }

    public function cuestionarios_doctor()
    {
        if (Auth::user()->nivel == "doctor") {
            $cuestionarios = Cuestionario::all()->where('doctor_id', 'is', Auth::user()->id);
        } elseif (Auth::user()->nivel == "admin") {
            $cuestionarios = Cuestionario::with("doctor")->get();
        }

        $cuestionarios_ids = [];
        foreach ($cuestionarios as $cuestionario) {
            array_push($cuestionarios_ids, $cuestionario->id);
        }
        $cuestionarios_usuarios_asignados = CuestionarioPaciente::all()->whereIn('id', $cuestionarios_ids);
        $asignados = [];
        foreach ($cuestionarios_usuarios_asignados as $cuestionario_usuario) {
            if (!array_key_exists($cuestionario_usuario->cuestionario_id, $asignados)) {
                $asignados[$cuestionario_usuario->cuestionario_id] = 0;
            }
            $asignados[$cuestionario_usuario->cuestionario_id]++;
        }
        return view("doctores.lista_cuestionarios", ["cuestionarios" => $cuestionarios, "asignados" => $asignados]);
    }

    public function agregar_cuestionario_doctor()
    {
        return view("doctores.agregar_cuestionario");
    }

    public function actualizar_cuestionario_doctor(int $id)
    {
        $cuestionario = Cuestionario::all()->where('id', $id)->first();
        $preguntas = CuestionarioPregunta::all()->where('cuestionario_id', $id);
        return view("doctores.actualizar_cuestionario", ["cuestionario" => $cuestionario, "preguntas" => $preguntas, "perfil" => []]);
    }

    public function cuestionario_doctor(int $id)
    {
        $cuestionario = Cuestionario::all()->where('id', $id)->first();
        $preguntas = CuestionarioPregunta::all()->where('cuestionario_id', $id);
        return view("doctores.ver_cuestionario", ["cuestionario" => $cuestionario, "preguntas" => $preguntas, "perfil" => []]);
    }

    public function crear_cuestionario_doctor(Request $request)
    {

        $id = $request->all()["id"];
        if (!$id) {
            $request->validate([
                'nombre' => 'required|unique:cuestionarios',
            ],
                [
                    'nombre.required' => 'El campo nombre es obligatorio',
                ]);
            $cuestionario = Cuestionario::create(["nombre" => $request->all()["nombre"], "doctor_id" => Auth::user()->id]);
            if ($cuestionario) {
                return redirect()->route("users.actualizar_cuestionario_doctor", ["id" => $cuestionario->id])->with("success", "Cuestionario creado exitosamente");
            } else {
                return redirect()->route("users.agregar_cuestionario_doctor")->with("error", "No se pudo crear el cuestionario");
            }
        } else {
            $tipo_pregunta = $request->all()["tipo"];
            if ($tipo_pregunta == "abierta") {
                $pregunta = [
                    "pregunta" => $request->all()["pregunta_abierta"],
                    "tipo" => $tipo_pregunta
                ];
                $registro_pregunta = [
                    "cuestionario_id" => $request->all()["id"],
                    "pregunta" => $pregunta,
                ];
            } else if ($tipo_pregunta == "multiple") {
                $opciones = [];
                foreach ($request->all() as $key => $val) {
                    if (!$val) {
                        continue;
                    }
                    if (strpos($key, "opcion") !== false) {
                        if(!$val || trim($val) == "" ) {
                            continue;
                        } elseif (strlen($val) < 6) {
                            return redirect()->back()->with("error", "Las opciones debe tener al menos 6 caracteres");
                        }
                        $parts = explode("_", $key);
                        $posicion = $parts[1];
                        $opciones[$posicion] = $val;
                    }
                }
                $pregunta = [
                    "pregunta" => $request->all()["pregunta_multiple"],
                    "opciones" => $opciones,
                    "tipo" => $tipo_pregunta
                ];
                $registro_pregunta = [
                    "cuestionario_id" => $request->all()["id"],
                    "pregunta" => $pregunta,
                ];
                if(count($pregunta["opciones"]) < 2) {
                    return redirect()->back()->with("error", "Se requieren al menos dos opciones");
                }
            } else if ($tipo_pregunta == "opcion") {
                $opciones = [];
                foreach ($request->all() as $key => $val) {
                    if (!$val) {
                        continue;
                    }
                    if (strpos($key, "opcion") !== false) {
                        if(!$val || trim($val) == "" ) {
                            continue;
                        } elseif (strlen($val) < 6) {
                            return redirect()->back()->with("error", "Las opciones debe tener al menos 6 caracteres");
                        }
                        $parts = explode("_", $key);
                        $posicion = $parts[1];
                        $opciones[$posicion] = $val;
                    }
                }
                $pregunta = [
                    "pregunta" => $request->all()["pregunta_opcion"],
                    "opciones" => $opciones,
                    "tipo" => $tipo_pregunta
                ];
                $registro_pregunta = [
                    "cuestionario_id" => $request->all()["id"],
                    "pregunta" => $pregunta,
                ];
                if(count($pregunta["opciones"]) < 2) {
                    return redirect()->back()->with("error", "Se requieren al menos dos opciones");
                }
            } else {
                return redirect()->back()->with("error", "No se agregó una pregunta");
            }
            if(!$pregunta["pregunta"] || trim($pregunta["pregunta"]) == "") {
                return redirect()->back()->with("error", "No se puede quedar la pregunta en blanco");
            } elseif (strlen($pregunta["pregunta"]) < 6) {
                return redirect()->back()->with("error", "La pregunta debe tener al menos 6 caracteres");
            }
            $nueva_pregunta = CuestionarioPregunta::create($registro_pregunta);
            if ($nueva_pregunta) {
                return redirect()->route("users.actualizar_cuestionario_doctor", ["id" => $request->all()["id"]]);
            }
        }
    }

    public function asignar_cuestionarios()
    {
        if (Auth::user()->nivel == "doctor") {
            $cuestionarios = Cuestionario::all()->where("doctor_id", Auth::id());
            $pacientes = PacienteDoctor::with(["paciente"])->where("doctor_id", Auth::id())->get();
        } else if (Auth::user()->nivel == "admin") {
            $cuestionarios = Cuestionario::all();
            $pacientes = PacienteDoctor::with(["paciente", "doctor"])->get();
        }

        return view("doctores.asignar_cuestionarios", ["cuestionarios" => $cuestionarios, "pacientes" => $pacientes]);
    }

    public function asignar_cuestionario(Request $request)
    {
        $paciente_id = $request->all()["paciente_id"];
        $cuestionario_id = $request->all()["cuestionario_id"];
        $existe = CuestionarioPaciente::all()->where("cuestionario_id", $cuestionario_id)->where("paciente_id", $paciente_id)->first();
        $cuestionario = Cuestionario::all()->where("id", $cuestionario_id)->first();
        if ($existe) {
            return redirect()->route("users.asignar_cuestionarios")->with("error", "Ya tiene registrado este cuestionario el paciente");
        } else {
            CuestionarioPaciente::create([
                "cuestionario_id" => $cuestionario_id,
                "paciente_id" => $paciente_id,
                "respuestas" => []
            ]);
            HistorialSesion::create([
                "paciente_id" => $paciente_id,
                "doctor_id" => Auth::id(),
                "mensaje" => "Cuestionario " . $cuestionario->nombre . " asignado al paciente.",
            ]);
            return redirect()->route("users.asignar_cuestionarios")->with("success", "Se asigno correctamente el cuestionario");
        }
    }

    public function contestar_cuestionario(int $id)
    {
        $cuestionario_paciente = CuestionarioPaciente::with(["evaluacion"])->where("id", $id)->first();
        $cuestionario = Cuestionario::all()->where("id", $cuestionario_paciente->cuestionario_id)->first();
        $preguntas = CuestionarioPregunta::all()->where("cuestionario_id", $cuestionario_paciente->cuestionario_id);
        $perfil = $cuestionario_paciente->respuestas;
        if (array_key_exists("user_id", $perfil)) {
            $usuario_contesto = User::all()->where("id", $perfil["user_id"])->first();
        } else {
            $usuario_contesto = null;
        }
        return view("pacientes.contestar_cuestionario", ["cuestionario" => $cuestionario, "preguntas" => $preguntas, "perfil" => $perfil, "usuario_contesto" => $usuario_contesto, "cuestionario_paciente" => $cuestionario_paciente]);
    }

    public function enviar_cuestionario(Request $request)
    {
        $cuestionario_paciente_id = $request->all()["cuestionario_paciente_id"];
        $cuestionario = CuestionarioPaciente::all()->where("id", $cuestionario_paciente_id)->first();
        $row_cuestionario = Cuestionario::all()->where("id", $cuestionario->cuestionario_id)->first();
        $cantidad_preguntas = CuestionarioPregunta::all()->where("cuestionario_id", $cuestionario->cuestionario_id)->count();
        if (((count($request->all()) - 2) / $cantidad_preguntas) > 0.6) {
            $cuestionario->terminado = true;
        }
        $request->request->remove("_token");
        $request->request->add(["user_id" => Auth::id()]);

        $cuestionario->respuestas = $request->all();
        $cuestionario->save();
        if (Auth::user()->nivel == "paciente") {
            HistorialSesion::create([
                "paciente_id" => Auth::id(),
                "doctor_id" => null,
                "mensaje" => "El paciente contestó cuestionario: " . $row_cuestionario->nombre,
            ]);
        } else {
            HistorialSesion::create([
                "paciente_id" => $cuestionario->paciente_id,
                "doctor_id" => Auth::id(),
                "mensaje" => "El doctor " . Auth::user()->name . " contestó cuestionario: " . $row_cuestionario->nombre,
            ]);
        }
        return redirect()->route("users.contestar_cuestionario", ["id" => $cuestionario_paciente_id])->with("success", "Se actualizó el cuestionario");
    }

    public function ver_cuestionario(int $cuestionario_usuario_id)
    {
        $cuestionario_usuario = CuestionarioPaciente::with('cuestionario')->where("id", $cuestionario_usuario_id)->first();
        $preguntas = CuestionarioPregunta::all()->where("cuestionario_id", $cuestionario_usuario->cuestionario_id);
        $respuestas = CuestionarioPaciente::all()->where("cuestionario_id", $cuestionario_usuario->cuestionario_id)->where("paciente_id", $cuestionario_usuario->paciente_id)->first();
        $perfil = $respuestas->respuestas;
        return view("doctores.ver_cuestionario", ["cuestionario" => $cuestionario_usuario, "preguntas" => $preguntas, "perfil" => $perfil]);
    }


}
