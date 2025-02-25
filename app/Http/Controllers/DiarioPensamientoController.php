<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiarioPensamiento;

class DiarioPensamientoController extends Controller
{
    public function entrada_diario(Request $request)
    {

        $user_nivel = Auth::user()->nivel;
        $request->validate(
            [
                "texto" => "required|min:6",
            ],
            [
                "texto.required" => "No se puede dejar el texto en blanco",
                "texto.min" => "El texto debe tener al menos 6 caracteres",
            ]
        );
        if ($user_nivel == "paciente") {
            $user_id = Auth::id();
            DiarioPensamiento::create(["texto" => $request->all()["texto"], "usuario_id" => $user_id, "paciente_id"=>$user_id]);
            return redirect("/")->with("success", "Se agregó la entrada de diario");
        } else if ($user_nivel == "doctor") {
            $user_id = Auth::id();
            DiarioPensamiento::create(["texto" => $request->all()["texto"], "usuario_id" => $user_id, "paciente_id"=>$request->all()["paciente_id"]]);
            return redirect()->route("users.paciente", ["id"=>$request->all()["paciente_id"]])->with("success", "Se agregó la entrada de diario");
        }

    }
}
