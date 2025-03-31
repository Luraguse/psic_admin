<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Bitacora;
use App\Models\ComentarioBitacora;

use Illuminate\Http\Request;

class BitacorasController extends Controller
{

    public function entradas(int $id)
    {
        $bitacoras = Bitacora::with(["comentarios", "doctor", "comentador"])->where("doctor_id", $id)->orderBy('created_at', 'desc')->get();
        return view('doctores.entradas_bitacora', compact('bitacoras'));
    }

    public function crear_entrada(Request $request, int $id)
    {
        if ($id != Auth::id()) {
            // Diferente doctor
            $entrada = [
                "doctor_id" => $id,
                "comentador_id" => Auth::id(),
                "texto" => $request->all()["texto"]
            ];
        } else {
            $entrada = [
                "doctor_id" => $id,
                "comentador_id" => null,
                "texto" => $request->all()["texto"]
            ];
        }
        $request->validate(
            [
                "texto" => "required|min:6|max:2255",
            ],
            [
                "texto.required" => "El texto es obligatorio",
                "texto.min" => "El texto debe tener al menos 6 caracteres",
                "texto.max" => "El texto no puede ser tan grande",
            ]
        );

        $new_entrada = Bitacora::create($entrada);
        $new_entrada->save();
        return redirect()->route('bitacora.entradas', $id);
    }

    public function comentar_entrada(Request $request, int $id_entrada)
    {
        $bitacora = Bitacora::all()->where("id", $id_entrada)->first();
        $comentario = [
            "doctor_id" => Auth::id(),
            "bitacora_id" => $id_entrada,
            "texto" => $request->all()["texto"]
        ];
        $request->validate(
            [
                "texto" => "required|min:6|max:2255"
            ],
            [
                "texto.required" => "El texto es obligatorio",
                "texto.min" => "El texto debe tener al menos 6 caracteres",
                "texto.max" => "El texto no puede ser tan grande",
            ]
        );
        ComentarioBitacora::create($comentario);
        return redirect()->back()->with("success", "Comentario agregado");
    }
}
