<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Cuestionario;
use App\Models\CuestionarioPaciente;
use App\Models\CuestionarioPregunta;
use App\Models\DiarioPensamiento;
use App\Models\Tarea;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        // Get count of existing users
        $count = User::select()->count();

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
            $cuestionarios_paciente = CuestionarioPaciente::all()->where("paciente_id", "=", Auth::id())->sortByDesc("created_at");
            $cuestionarios_id = [];
            foreach ($cuestionarios_paciente as $cuestionario) {
                $cuestionarios_id[] = $cuestionario->cuestionario_id;
            }
            $cuestionarios = Cuestionario::all()->whereIn("id", $cuestionarios_id)->sortByDesc("created_at");
            $diario_pensamientos = DiarioPensamiento::all()->where("paciente_id", "=", Auth::id())->sortByDesc("created_at");
            return view("dashboard", ["cuestionarios" => $cuestionarios, "diario_pensamientos" => $diario_pensamientos]);
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
            if(Auth::check()) {
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
        if(!Auth::check()) {
            return redirect('/login')->with('success', 'Se registró correctamente, por favor inicie sesión.');
        }
        $current_user = Auth::user();

        if ($current_user->nivel == "admin") {
            return redirect()->route("users.view", ['id' => $user_created->id])->with("success", "Usuario creado exitosamente");
        }
        return redirect('/login')->with('success', 'Registration successful! Please log in.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
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

    public function edit_user(int $id) {
        $user = User::all()->where("id", $id)->first();
        if(Auth::user()->nivel == "paciente") {
            if($user->id != Auth::id()) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
        } else if(Auth::user()->nivel == "doctor") {
            if($user->nivel == "admin" or ($user->nivel == "doctor" and $user->id != Auth::id())) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
            if($user->nivel == "paciente" && $user->doctor_id != Auth::id()) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
        }
        return view("users.edit", ["user" => $user]);
    }

    public function update_user(Request $request,  int $id) {
        $user = User::all()->where("id", $id)->first();
        $nivel_usuario = Auth::user()->nivel;
        if($nivel_usuario == "paciente") {
            if($user->id != Auth::id()) {
                return redirect("/")->with("error",  "No tienes permiso para acceder a este recurso");
            }
        } else if($nivel_usuario == "doctor") {
            if($user->nivel == "admin" or ($user->nivel == "doctor" and $user->id != Auth::id())) {
                return redirect("/")->with("error", "No tienes permiso para acceder a este recurso");
            }
            if($user->nivel == "paciente" && $user->doctor_id != Auth::id()) {
                return redirect('/')->with("error", "No tienes permiso para acceder a este recurso");
            }
        }

        if(!$request->all()["password"] and !$request->all()["password_confirmation"]) {
            $request->validate([
                'name' => 'required|min:6',
                'email' => 'required|email|unique:users,email,'.$user->id,
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
                'email' => 'required|email|unique:users,email,'.$user->id,
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
            if (Auth::user()->nivel == "doctor" && $user->doctor_id != Auth::id()) {
                return redirect("/")->with('error', 'No tienes permiso para ver este usuario.');
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
        $pacientes = User::all()->where('nivel', 'paciente');
        $doctores = User::all()->where('nivel', 'doctor');
        $lista_doctores = [];
        foreach ($doctores as $doctor) {
            $lista_doctores[$doctor->id] = $doctor->name;
        }
        return view('users.pacientes', ["pacientes" => $pacientes, 'lista_doctores' => $lista_doctores]);
    }

    public function pacientes_doctor()
    {
        $doctor = Auth::user();
        if ($doctor->nivel != "doctor") {
            return redirect("/")->with('error', 'No tienes permiso para ver esta sección.');
        }
        $pacientes = User::all()->where('nivel', 'paciente')->where('doctor_id', $doctor->id);
        return view('doctores.lista_pacientes', ["pacientes" => $pacientes]);
    }

    public function paciente(int $id)
    {

        $paciente = User::all()->where("id", $id)->first();
        if (Auth::user()->nivel == "paciente" && Auth::user()->id != $id) {
            return redirect("/")->with('error', 'No tienes permiso para ver este usuario.');
        }
        if (Auth::user()->nivel == "doctor" && $paciente->doctor_id != Auth::id()) {
            return redirect("/")->with('error', 'No tienes permiso para ver este usuario.');
        }
        if ($paciente == null) {
            return redirect('/')->with('error', 'No se encontro el paciente.');
        }
        if ($paciente->nivel == "paciente") {
            $perfil = Perfil::all()->where("user_id", $paciente->id)->first();
            if ($perfil !== null) {
                $perfil = json_decode($perfil->perfil, true);
            } else {
                return redirect('/')->with('error', 'El usuario no tiene un perfil registrado.');
            }
            $diario_pensamientos = DiarioPensamiento::all()->where("paciente_id", $paciente->id)->sortByDesc("created_at");
            $cuestionarios_paciente = CuestionarioPaciente::all()->where("paciente_id", "=", $paciente->id)->sortByDesc("created_at");
            $cuestionarios_id = [];
            foreach ($cuestionarios_paciente as $cuestionario) {
                $cuestionarios_id[] = $cuestionario->cuestionario_id;
            }
            $cuestionarios = Cuestionario::all()->whereIn("id", $cuestionarios_id)->sortByDesc("created_at");
            return view('users.perfilusuario', ["paciente" => $paciente, "perfil" => $perfil, "diario_pensamientos" => $diario_pensamientos, "cuestionarios" => $cuestionarios, "paciente_id"=>$paciente->id]);
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
        $pacientes = User::all()->where('nivel', 'paciente')->where('doctor_id', 'is', null);
        $doctores = User::all()->where('nivel', 'doctor');
        return view('pacientes.asignar', ["pacientes" => $pacientes, 'doctores' => $doctores]);
    }

    public function asignar_paciente(Request $request)
    {
        if (Auth::user()->nivel != "admin") {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta seccion');
        }

        $paciente = User::all()->where('id', $request->all()["paciente_id"])->where("nivel", "paciente")->first();
        if ($paciente == null) {
//            return view("users.asignar_pacientes")->with("error", "El paciente no existe");
            return redirect()->route("users.asignar_pacientes")->with("error", "El paciente no existe");
        }
        $doctor = User::all()->where('id', $request->all()["doctor_id"])->where("nivel", "doctor")->first();
        if ($doctor == null) {
//            return view("users.asignar_pacientes")->with("error", "El doctor no existe");
            return redirect()->route("users.asignar_pacientes")->with("error", "El doctor no existe");
        }
        $paciente->doctor_id = $request->all()["doctor_id"];
        $paciente->save();
//        return view("users.asignar_pacientes")->with("success", "Paciente actualizado exitosamente");
        return redirect()->route("users.asignar_pacientes")->with("success", "Paciente actualizado exitosamente");
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
        $cuestionarios = Cuestionario::all()->where('doctor_id', 'is', Auth::user()->id);
        $cuestionarios_ids = [];
        foreach ($cuestionarios as $cuestionario) {
            array_push($cuestionarios_ids, $cuestionario->id);
        }
        $cuestionarios_usuarios_asignados = CuestionarioPaciente::all()->whereIn('id', $cuestionarios_ids);
        $asignados = [];
        foreach ($cuestionarios_usuarios_asignados as $cuestionario_usuario) {
            if (!array_key_exists($cuestionario_usuario->id, $asignados)) {
                $asignados[$cuestionario_usuario->id] = 0;
            }
            $asignados[$cuestionario_usuario->id]++;
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
                'nombre' => 'required',
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

            } else if ($tipo_pregunta == "opcion") {
                $opciones = [];
                foreach ($request->all() as $key => $val) {
                    if (!$val) {
                        continue;
                    }
                    if (strpos($key, "opcion") !== false) {
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
            } else {

            }
            $nueva_pregunta = CuestionarioPregunta::create($registro_pregunta);
            if ($nueva_pregunta) {
                return redirect()->route("users.actualizar_cuestionario_doctor", ["id" => $request->all()["id"]]);
            }
        }
    }

    public function asignar_cuestionarios()
    {
        $cuestionarios = Cuestionario::all()->where("doctor_id", Auth::id());
        $pacientes = User::all()->where("doctor_id", Auth::id())->where("nivel", "paciente");
        return view("doctores.asignar_cuestionarios", ["cuestionarios" => $cuestionarios, "pacientes" => $pacientes]);
    }

    public function asignar_cuestionario(Request $request)
    {
        $paciente_id = $request->all()["paciente_id"];
        $cuestionario_id = $request->all()["cuestionario_id"];
        $existe = CuestionarioPaciente::all()->where("cuestionario_id", $cuestionario_id)->where("paciente_id", $paciente_id)->first();
        if ($existe) {
            return redirect()->route("users.asignar_cuestionarios")->with("error", "Ya tiene registrado este cuestionario el paciente");
        } else {
            CuestionarioPaciente::create([
                "cuestionario_id" => $cuestionario_id,
                "paciente_id" => $paciente_id,
                "respuestas" => []
            ]);
            return redirect()->route("users.asignar_cuestionarios")->with("success", "Se asigno correctamente el cuestionario");
        }
    }

    public function contestar_cuestionario(int $id)
    {
        $cuestionario = Cuestionario::all()->where("id", $id)->first();
        $preguntas = CuestionarioPregunta::all()->where("cuestionario_id", $id);
        $respuestas = CuestionarioPaciente::all()->where("cuestionario_id", $id)->where("paciente_id", Auth::id())->first();
        $perfil = $respuestas->respuestas;
        return view("pacientes.contestar_cuestionario", ["cuestionario" => $cuestionario, "preguntas" => $preguntas, "perfil" => $perfil]);
    }

    public function enviar_cuestionario(Request $request)
    {
        $cuestionario_id = $request->all()["cuestionario_id"];
        $cuestionario = CuestionarioPaciente::all()->where("cuestionario_id", $cuestionario_id)->first();
        $cuestionario->respuestas = $request->all();
        $cuestionario->save();
        return redirect()->route("users.contestar_cuestionario", ["id" => $cuestionario_id])->with("success", "Se actualizó el cuestionario");
    }

    public function ver_cuestionario(int $cuestionario_id, int $paciente_id) {
        $cuestionario = Cuestionario::all()->where("id", $cuestionario_id)->first();
        $preguntas = CuestionarioPregunta::all()->where("cuestionario_id", $cuestionario_id);
        $respuestas = CuestionarioPaciente::all()->where("cuestionario_id", $cuestionario_id)->where("paciente_id", $paciente_id)->first();
        $perfil = $respuestas->respuestas;
        return view("doctores.ver_cuestionario", ["cuestionario" => $cuestionario, "preguntas" => $preguntas, "perfil" => $perfil]);
    }


}
