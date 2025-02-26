<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rol;
use App\Models\subir_archivo;
use Illuminate\Support\Facades\Storage;

class archivosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function vista(){
        return view('archivos.subirarchivos');

        
    }
    public function vistaArchivos()
    {
        //
        
        return view('welcome');
    }
    // public function subirArchivo(Request $request)
    // {

    //     $request->validate([
    //         'archivo' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
    //         'archivo_id' => 'required|exists:archivos,id',
    //         'usuarios_id' => 'required|exists:users,id'
    //     ]);
    
    //     $rutaArchivo = $request->file('archivo')->store('archivos', 'public');
    
    
    //     $nombreArchivo = $request->file('archivo')->getClientOriginalName();
    //     $tipoMime = $request->file('archivo')->getClientMimeType();
    //     $subirArchivo = new SubirArchivo();
    //     $subirArchivo->nombre_archivo = $nombreArchivo;
    //     $subirArchivo->ruta_archivo = $rutaArchivo;
    //     $subirArchivo->fecha_subida = now();
    //     $subirArchivo->tipo_archivo = $tipoMime;
    //     $subirArchivo->archivo_id = $request->archivo_id;
    //     $subirArchivo->usuarios_id = $request->usuarios_id;
    //     $subirArchivo->save();
    
    //     return response()->json([
    //         'mensaje' => 'Archivo subido con éxito',
    //         'ruta' => Storage::url($rutaArchivo)
    //     ]);
    // }
    public function subirArchivo(Request $request)
    {
        // 🔹 1. Depuración de Request
        if (!$request->hasFile('archivo')) {
            return response()->json(['error' => 'No se envió ningún archivo'], 400);
        }
        
        // 🔹 2. Depuración de Validación
        try {
            $request->validate([
                'archivo' => 'required|file|mimes:jpg,png,pdf,docx|max:2048',
                'archivo_id' => 'required|exists:archivos,id',
                'usuarios_id' => 'required|exists:users,id'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['error' => 'Validación fallida', 'detalles' => $e->errors()], 422);
        }
    
        // 🔹 3. Depuración de Almacenamiento de Archivo
        try {
            $archivo = $request->file('archivo');
            $rutaArchivo = $archivo->store('archivos', 'public');
    
            if (!$rutaArchivo) {
                return response()->json(['error' => 'No se pudo almacenar el archivo'], 500);
            }
    
            $nombreArchivo = $archivo->getClientOriginalName();
            $tipoMime = $archivo->getClientMimeType();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al procesar el archivo', 'detalles' => $e->getMessage()], 500);
        }
    
        // 🔹 4. Depuración de Guardado en Base de Datos
        try {
            $subirArchivo = new subir_archivo();
            $subirArchivo->nombre_archivo = $nombreArchivo;
            $subirArchivo->ruta_archivo = $rutaArchivo;
            $subirArchivo->fecha_subida = now();
            $subirArchivo->tipo_archivo = $tipoMime;
            $subirArchivo->archivo_id = $request->archivo_id;
            $subirArchivo->usuarios_id = $request->usuarios_id;
    
            if (!$subirArchivo->save()) {
                return response()->json(['error' => 'Error al guardar en la base de datos'], 500);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error en la base de datos', 'detalles' => $e->getMessage()], 500);
        }
    
        // 🔹 5. Depuración de Respuesta
        $urlArchivo = Storage::url($rutaArchivo);
    
        if (!$urlArchivo) {
            return response()->json(['error' => 'No se pudo generar la URL del archivo'], 500);
        }
    
        return response()->json([
            'mensaje' => 'Archivo subido con éxito',
            'ruta' => $urlArchivo
        ]);
    }


}



