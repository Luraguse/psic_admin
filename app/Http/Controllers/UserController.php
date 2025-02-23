<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        // Get count of existing users
        $count = User::select()->count();

        if($count == 0){
            return view('auth.register', ["user"=>null, "count"=>0]);
        }
        if (Auth::check()) {
            $user = Auth::user();
            return view('auth.register', ["user" => $user, "count"=>$count]);
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
        if ($count == 0){
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

        if($current_user->nivel == "admin"){
            return redirect()->route("users.view", ['id'=> $user_created->id])->with("success", "Usuario creado exitosamente");
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

    public function index() {

    }

    public function view(int $id) {
        $user = User::all()->find($id);
        if($user == null){
            return redirect('/')->with('error', 'No se encontro el usuario.');
        }
        return view('users.view', ["user"=>$user]);
    }

    public function pacientes() {
        $pacientes = User::all()->where('nivel', 'paciente');
        $doctores = User::all()->where('nivel', 'doctor');
        $lista_doctores = [];
        foreach($doctores as $doctor){
            $lista_doctores[$doctor->id] = $doctor->name;
        }
        return view('users.pacientes', ["pacientes"=>$pacientes, 'lista_doctores'=>$lista_doctores]);
    }

    public function doctors(Request $request) {
        $doctors = User::all()->where('nivel', 'doctor');
        # check if json response or html
        $lista_doctores = [];
        foreach($doctors as $doctor){
            $lista_doctores[$doctor->id] = $doctor->name;
        }
        if($request->ajax()) {
            return response()->json(["doctors"=>$lista_doctores]);
        }
        return view('users.doctors', ["doctors"=>$lista_doctores]);
    }

}
