<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\TareaPaciente;
use App\Models\CuestionarioPaciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Evaluacion;
use App\Models\HistorialSesion;

class EvalucionesController extends Controller
{
    public function agregar_evaluacion(Request $request, int $id)
    {

        if(Auth::user()->nivel != "admin" && Auth::user()->nivel != "doctor") {
            return redirect("/")->with("error", "No tienes permisos para acceder a esta pagina");
        }

        $request->validate([
            "evaluacion" => "required|min:6|max:2500",
        ],
            [
                "evaluacion.required" => "No se puede dejar la evaluación en blanco",
                "evaluacion.min" => "La evaluación no puede ser menor a 6 caracteres",
                "evaluacion.max" => "La evaluación no puede ser tan larga",
            ]
        );
        if($request->all()["tipo"] == "tarea") {
            $tarea = TareaPaciente::with("tarea")->where("id", $id)->first();
            HistorialSesion::create([
                "paciente_id" => $tarea->paciente_id,
                "doctor_id" => Auth::id(),
                "mensaje" => "Tarea " . $tarea->tarea->nombre . " asignada a paciente.",
            ]);
        } elseif ($request->all()["tipo"] == "cuestionario") {
            $cuestionario = CuestionarioPaciente::with("cuestionario")->where("id", $id)->first();
            HistorialSesion::create([
                "paciente_id" => $cuestionario->paciente_id,
                "doctor_id" => Auth::id(),
                "mensaje" => "Cuestionario " . $cuestionario->cuestionario->nombre . " asignada a paciente.",
            ]);
        } else {

        }
        $request->request->add(["usuario_evaluador_id" => Auth::user()->id]);
        $request->request->add(["resource_id" => $id]);
        Evaluacion::create($request->all());

        return redirect()->back()->with("success", "Se agregó la evaluación correctamente");
    }
}
