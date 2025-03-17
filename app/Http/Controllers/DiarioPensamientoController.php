<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DiarioPensamiento;
use App\Models\HistorialSesion;

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
            HistorialSesion::create([
                "paciente_id" => $user_id,
                "mensaje" => "El paciente agregó entrada al diario de pensamientos.",
            ]);
            return redirect("/")->with("success", "Se agregó la entrada de diario");
        } else {
//            HistorialSesion::create([
//                "paciente_id" => $request->all()["paciente_id"],
//                "doctor_id" => Auth::id(),
//                "mensaje" => "Doctor agregó entrada al diario de pensamientos.",
//            ]);
        }
        $user_id = Auth::id();
        DiarioPensamiento::create(["texto" => $request->all()["texto"], "usuario_id" => $user_id, "paciente_id"=>$request->all()["paciente_id"]]);
        return redirect()->route("users.paciente", ["id"=>$request->all()["paciente_id"]])->with("success", "Se agregó la entrada de diario");

    }
}
