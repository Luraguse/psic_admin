<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comentario;
use App\Models\DiarioPensamiento;

class ComentariosController extends Controller
{
    public function agregar_comentario_pensamiento(Request $request, int $id_pensamiento)
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
        $pensamiento = DiarioPensamiento::all()->where("id", $id_pensamiento)->first();
        if(!$pensamiento){
            return redirect()->back()->with("error", "No se encuentra el pensamiento");
        }
        $user_id = Auth::id();
        if ($user_nivel == "paciente") {


            if($pensamiento->paciente_id != $user_id){
                return redirect("/")->with("error", "No tienes permiso para agregar comentarios");
            }
        }
        Comentario::create(["texto" => $request->all()["texto"], "diario_pensamiento_id" => $id_pensamiento, "usuario_id" => $user_id]);
        return redirect()->route("users.paciente", ["id"=>$pensamiento->paciente_id])->with("success", "Se agregó el comentario al diario");
    }
}
