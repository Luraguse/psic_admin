<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
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
        if (Auth::check()) {
            $user = Auth::user();
            return view('auth.register', ["user" => $user, "count" => $count]);
        } else {
            return redirect('/login');
        }

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
            $nivel = $request->nivel;
        }
        $new_user = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            "nivel" => $nivel,
        ];
        $user_created = User::create($new_user);
        # Get new User ID

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

    public function logout(): void
    {
        Auth::logout();
    }

    public function index()
    {

    }

    public function view(int $id)
    {
        $user = User::first()->find($id);
        if ($user == null) {
            return redirect('/')->with('error', 'No se encontro el usuario.');
        }
        if ($user->nivel == "paciente") {
            $info_paciente = Perfil::all()->where("user_id", $user->id)->first();
            if($info_paciente !== null){
                $info_paciente = json_decode($info_paciente->perfil, true);
            }
            $doctor_asignado = null;
            if (!$user->doctor_id) {
                $lista_doctores = null;
            }
            return view('users.view', ["user" => $user, "perfil"=> $info_paciente, "doctor_asignado" => $doctor_asignado]);
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
                "edad" =>  $request->all()["edad"],
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

    public function asignar_pacientes() {
        if(Auth::user()->nivel != "admin") {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta seccion');
        }
        $pacientes = User::all()->where('nivel', 'paciente')->where('doctor_id' , 'is', null);
        $doctores =  User::all()->where('nivel', 'doctor');
        return view('pacientes.asignar', ["pacientes"  => $pacientes, 'doctores' => $doctores]);
    }

    public function asignar_paciente(Request $request)
    {
        if(Auth::user()->nivel != "admin") {
            return redirect('/')->with('error', 'No tienes permiso para acceder a esta seccion');
        }

        $paciente = User::all()->where('id', $request->all()["paciente_id"])->where("nivel", "paciente")->first();
        if ($paciente == null) {
//            return view("users.asignar_pacientes")->with("error", "El paciente no existe");
            return redirect()->route("users.asignar_pacientes", )->with("error", "El paciente no existe");
        }
        $doctor =  User::all()->where('id', $request->all()["doctor_id"])->where("nivel", "doctor")->first();
        if($doctor == null) {
//            return view("users.asignar_pacientes")->with("error", "El doctor no existe");
            return redirect()->route("users.asignar_pacientes", )->with("error", "El doctor no existe");
        }
        $paciente->doctor_id = $request->all()["doctor_id"];
        $paciente->save();
//        return view("users.asignar_pacientes")->with("success", "Paciente actualizado exitosamente");
        return redirect()->route("users.asignar_pacientes", )->with("success", "Paciente actualizado exitosamente");
    }
}
