<?php

namespace App\Http\Controllers;

use App\Models\TareaPaciente;
use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TareasController extends Controller
{
    public function lista() {
        if(Auth::user()->nivel == 'admin') {
            $tareas = Tarea::with("doctor")->get();
        } elseif(Auth::user()->nivel == 'doctor') {
            $tareas = Tarea::with("doctor")->where("id_doctor", Auth::id())->get();
        } else {
            return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
        }
        return view('tareas.lista', compact('tareas'));
    }

    public function agregar() {
        if(Auth::user()->nivel != 'admin' && Auth::user()->nivel != 'doctor') {
            return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
        }
        return view('tareas.agregar');
    }

    public function crear(Request $request) {
//        dd($request->all());
        if(Auth::user()->nivel  != 'admin' && Auth::user()->nivel != 'doctor') {
            return redirect("/")->with("error",  "No tiene permiso para acceder a esta pagina");
        }
        $request->validate([
            "nombre"  => "required|min:6|max:255",
            "tarea"  => "required|min:6|max:2550",
        ],[
            "nombre.required" => "Se requiere un nombre para la tarea",
            "nombre.min" => "El nombre debe tener al menos 6 caracteres",
            "nombre.max" => "El nombre no puede tener mas de 255 caracteres",
            "tarea.required" => "Se requiere una descripcion para la tarea",
            "tarea.min" =>  "La descripcion debe tener al menos 6 caracteres",
            "tarea.max" => "La descripcion no puede ser tan larga",
        ]);
        $request->request->add(["id_doctor" => Auth::id()]);

        Tarea::create($request->all());
        return redirect()->route("tareas.lista")->with("success", "Tarea agregada exitosamente");

    }

    public function ligar() {
        if(Auth::user()->nivel == 'admin') {
            $tareas = Tarea::with("doctor")->get();
            $pacientes = User::all()->where("nivel", "paciente");
        } elseif(Auth::user()->nivel == 'doctor') {
            $tareas = Tarea::with("doctor")->where("id_doctor", Auth::id())->get();
            $pacientes = User::all()->where("nivel", "paciente")->where("doctor_id", Auth::id());
        } else {
            return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
        }
        return view('tareas.ligar', compact('tareas', "pacientes"));
    }

    public function asignar(Request $request) {
        if(Auth::user()->nivel != 'admin' && Auth::user()->nivel != 'doctor') {
            return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
        }
        $doctor_id = Auth::id();
        $request->validate([
            "id_tarea"  => "required",
            "paciente_id" =>  "required",
        ],
        [
            "id_tarea.required" => "Se requiere seleccionar una tarea",
            "paciente_id.required" => "Se requiere seleccionar un paciente",
        ]);
        $request->request->add(["doctor_id" => $doctor_id]);
        TareaPaciente::create($request->all());
        return redirect()->route('tareas.ligar')->with("success", "Tarea agregada exitosamente");
    }

    public function ver(int $id) {
        $tarea_paciente = TareaPaciente::with(["doctor", "tarea"])->findOrFail($id);
        if(Auth::user()->nivel == "paciente" &&  $tarea_paciente->paciente_id != Auth::id()) {
            return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
        }
        return view('tareas.ver', compact('tarea_paciente'));
    }

    public function actualizar(Request $request, int $id) {
        $tarea_paciente = TareaPaciente::with(["doctor", "tarea"])->findOrFail($id);
        if(Auth::user()->nivel == "paciente" &&  $tarea_paciente->paciente_id != Auth::id()) {
            return redirect("/")->with("error", "No tiene permiso para acceder a esta pagina");
        }
        $request->validate([
            "respuesta" => "required|min:6|max:2550",
        ], [
            "respuesta.required" => "Se requiere una respuesta",
            "respuesta.min" => "La respuesta debe tener al menos 6 caracteres",
            "respuesta.max" => "La respuesta no puede ser tan larga",
        ]);
        if($request->file('file_upload')){
            $file = $request->file('file_upload');
            $fecha = Carbon::now()->format('YmdHis');
            $file->storePubliclyAs("uploads/tareas", $fecha . "_" . $file->getClientOriginalName(), 'public');
            $request->request->add(['recurso' => $fecha . "_" . $file->getClientOriginalName()]);
        }
        $request->request->add(["terminado"=>true]);
        $tarea_paciente->update($request->all());
        if(Auth::user()->nivel == "paciente") {
            return redirect("/")->with("success", "Se actualizó la tarea");
        }
        return redirect()->route("users.paciente", ["id"=>$tarea_paciente->paciente_id])->with("success", "Tarea actualizada exitosamente");

    }

    public function descargar(int $id) {
        $tarea_paciente = TareaPaciente::all()->findOrFail($id);
        if($tarea_paciente->recurso) {
            return response()->download(storage_path("app/public/uploads/tareas/" . $tarea_paciente->recurso));
        }
        return redirect()->back()->with("error", "No se encontró el archivo");
    }
}
