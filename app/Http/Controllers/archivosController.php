<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rol;
use App\Models\subir_archivo;
use App\Models\archivo;
use App\Models\area;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class archivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function vistaArchivos(){
        return view('archivos.subirarchivos');

        
    }
    public function subirArchivo(Request $request)
    {
        // dd($request);
    
        $request->validate([
            'archivo' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
            'archivo_id' => 'required|exists:archivos,id',
        ]);

        $archivo = $request->file('archivo');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
        $rutaArchivo = $archivo->storeAs('public/archivos', $nombreArchivo);

        $subirArchivo = subir_archivo::create([
            'nombre_archivo' => $nombreArchivo,
            'ruta_archvo' => $rutaArchivo,
            'fecha_subida' => now(),
            'tipo_archivo' => $archivo->getClientMimeType(),
            'archivo_id' => $request->archivo_id,
            // 'usuarios_id' => auth()->id(),
            'usuarios_id' => $request->usuarios_id,
        ]);

        return response()->json(['message' => 'Archivo subido exitosamente', 'archivo' => $subirArchivo]);
    }
    public function guarDardatos(Request $request){
        // dd($request);
        $request->validate([
            'area_nombre' => 'required|string|max:255',
            'archivo_descripcion' => 'required|string|max:255',
            'archivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'archivo_id' => 'required|exists:archivos,id',

        ]);
        $area = area::create([
            'nombre'=>$request->area_nombre,
            'estado' => 1,
        ]);
        $archivo = archivo::create([
            'descripcion' =>$request->archivo_descripcion,
            'estado'=>1,
            'area'=>$area->id,
            'users_id'=>$request->user_id,
            // 'uesrs_id' => $request->usuarios_id,
        ]);
        $archivo = $request->file('archivo');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
        $rutaArchivo = $archivo->storeAs('public/archivos', $nombreArchivo);

        $subirArchivo = subir_archivo::create([
            'nombre_archivo' => $nombreArchivo,
            'ruta_archvo' => $rutaArchivo,
            'fecha_subida' => now(),
            'tipo_archivo' => $archivo->getClientMimeType(),
            // 'archivo_id' => $archivo->id,
            'archivo_id' => $request->archivo_id,
            // 'usuarios_id' => auth()->id(),
            'usuarios_id' => $request->usuarios_id,
        ]);

        return response()->json(['message' => 'Archivo subido exitosamente', 'archivo' => $subirArchivo]);
    }

    public function verArchivos(){
        $archivos = subir_archivo::with('users')->get();
        return view('dashboard.administrador',compact('archivos'));

    }
   

 
}



