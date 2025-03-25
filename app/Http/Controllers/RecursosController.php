<?php

namespace App\Http\Controllers;

use App\Models\Recurso;
use App\Models\RecursoUsuario;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\HistorialSesion;

class RecursosController extends Controller
{
    public function lista()
    {
        if (Auth::user()->nivel == "doctor") {
            $recursos = Recurso::all()->where("usuario_id", Auth::user()->id)->sortByDesc("created");
        } elseif (Auth::user()->nivel == "admin") {
            $recursos = Recurso::with("usuario")->get()->sortByDesc("created");
        } else {
            return redirect('/')->with("error", "No tiene permiso para acceder a esta pagina");
        }
        return view('recursos.lista', ['recursos' => $recursos ?? []]);
    }

    public function download(int $id)
    {
        $recurso = Recurso::all()->where("id", $id)->first();

        if ($recurso->tipo == "documento") {
            if(Auth::user()->nivel=="paciente") {
                $recurso_usuario = RecursoUsuario::all()->where("recurso_id", $id)->where("usuario_id", Auth::id());
                if($recurso_usuario->usuario_id != Auth::id()) {
                    return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
                }
                $recurso_usuario->terminado = true;
                $recurso_usuario->save();
                HistorialSesion::create([
                    "paciente_id" => $recurso_usuario->usuario_id,
                    "doctor_id" => null,
                    "mensaje" => "El paciente descargó recurso: " . $recurso->nombre,
                ]);
            }
            return response()->download(storage_path("app/public/uploads/recursos/" . $recurso->liga));

        } else {
            if(Auth::user()->nivel=="paciente") {
                $recurso_usuario = RecursoUsuario::all()->where("recurso_id", $id)->where("usuario_id", Auth::id());
                if($recurso_usuario->usuario_id == Auth::id()) {
                    $recurso_usuario->terminado = true;
                    $recurso_usuario->save();
                    HistorialSesion::create([
                        "paciente_id" => $recurso_usuario->usuario_id,
                        "doctor_id" => null,
                        "mensaje" => "El paciente visitó el recurso: " . $recurso->nombre,
                    ]);
                }
            }
            return redirect()->to($recurso->liga);
        }
        return redirect()->back()->with("error", "No se encontró el archivo");
    }

    public function asignar()
    {
        if (Auth::user()->nivel == "admin") {
            $pacientes = User::all()->whereNotNull("doctor_id")->sortByDesc("created");
            $recursos = Recurso::all()->sortByDesc("created");
        } elseif (Auth::user()->nivel == "doctor") {
            $pacientes = User::all()->where('nivel', 'paciente')->where("doctor_id", Auth::id())->sortByDesc("created");
            $recursos = Recurso::all()->where("usuario_id", Auth::id())->sortByDesc("created");
        } else {
            return redirect()->back()->with("error", "No tiene permiso para acceder a esta pagina");
        }
        return view('recursos.asignar', ['pacientes' => $pacientes ?? [], 'recursos' => $recursos ?? []]);
    }

    public function ligar_recurso(Request $request)
    {
        if(Auth::user()->nivel!="admin" and Auth::user()->nivel!="doctor"){
            return redirect()->back()->with("error", "No tiene permiso para acceder a esta pagina");
        }
        $request->request->add(['usuario_asigna_id' => Auth::id()]);
        $request->validate([
            'recurso_id' => 'required',
            'usuario_id' => 'required',
            'usuario_asigna_id' => 'required',
        ],[
            'recurso_id.required' => 'El recurso es requerido',
            'usuario_id.required' => 'El usuario es requerido',
        ]);
        $recurso = Recurso::all()->where("id", $request->all()["recurso_id"])->first();
        RecursoUsuario::create($request->all());
        HistorialSesion::create([
            "paciente_id" => $request->all()["usuario_id"],
            "doctor_id" => Auth::id(),
            "mensaje" => "Recurso " . $recurso->nombre . " asignado a paciente.",
        ]);
        return redirect()->back()->with("success", "Recurso agregado correctamente");
    }

    public function crear_recurso(Request $request)
    {
        $nivel_usuario = Auth::user()->nivel;
        if ($nivel_usuario != "admin" and $nivel_usuario != "doctor") {
            return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
        }

        $tipo_recurso = $request->all()["tipo"];
        $request->request->add(['usuario_id' => Auth::id()]);
        if ($tipo_recurso == "video") {

            $request->request->add(['liga' => $request->all()["video_upload"]]);
            $request->validate([
                'nombre' => 'required|max:255|min:6',
                'descripcion' => 'required|max:255|min:6',
                'tipo' => 'required',
                'liga' => 'required|url:https',
            ], [
                'nombre.required' => 'El campo nombre es obligatorio',
                'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
                'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres',
                'descripcion.required' => 'El campo descripcion es obligatorio',
                'descripcion.min' => 'El campo descripcion debe tener al menos 6 caracteres',
                'descripcion.max' => 'El campo descripcion no puede tener más de 255 caracteres',
                'tipo.required' => 'El campo tipo es obligatorio',
                'liga.required' => 'No se adjuntó un recurso',
                'liga.url' => 'El campo tipo debe ser una url con HTTPS',
            ]);

        } else if ($tipo_recurso == "documento") {

            $request->validate([
                'nombre' => 'required|max:255|min:6',
                'descripcion' => 'required|max:255|min:6',
                'tipo' => 'required',
                'file_upload' => 'required|mimes:pdf,doc,docx,ppt,pptx,xlsx,xls,csv,png,jpg,jpeg,gif|max:2048',
            ], [
                'nombre.required' => 'El campo nombre es obligatorio',
                'nombre.min' => 'El campo nombre debe tener al menos 6 caracteres',
                'nombre.max' => 'El campo nombre no puede tener más de 255 caracteres',
                'descripcion.required' => 'El campo descripcion es obligatorio',
                'descripcion.min' => 'El campo descripcion debe tener al menos 6 caracteres',
                'descripcion.max' => 'El campo descripcion no puede tener más de 255 caracteres',
                'tipo.required' => 'El campo tipo es obligatorio',
                'file_upload.required' => 'No se adjuntó un recurso',
            ]);
            $file = $request->file('file_upload');
            $fecha = Carbon::now()->format('YmdHis');
            $file->storePubliclyAs("uploads/recursos", $fecha . "_" . $file->getClientOriginalName(), 'public');
            $request->request->add(['liga' => $fecha . "_" . $file->getClientOriginalName()]);
        } else {
            return redirect()->back()->with('error', "No se reconoce el tipo de recurso");
        }
        Recurso::create($request->all());

        return redirect()->route("recursos.lista")->with("success", "Recurso creado correctamente");
    }

    public function agregar_recurso()
    {
        return view('recursos.agregar');
    }
}
