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
    public function vistaEditarArchivos(){
        return view('dashboard.editar');

        
    }

    public function guarDardatos(Request $request){
        // dd($request);
        $request->validate([
            'area_nombre' => 'required|string|max:255',
            'archivo_descripcion' => 'required|string|max:255',
            'archivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'usuarios_id' => 'required',

        ]);
        $area = area::create([
            'nombre'=>$request->area_nombre,
            'estado' => 1,
        ]);
        $archivoModel = archivo::create([
            'descripcion' =>$request->archivo_descripcion,
            'estado'=>1,
            'area_id'=>$area->id,
            'users_id'=>$request->user_id,
            // 'uesrs_id' => $request->usuarios_id,
        ]);
        $archivo = $request->file('archivo');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
        $rutaArchivo = $archivo->storeAs('public/archivos', $nombreArchivo);
    // dd($archivoModel);
        $subirArchivo = subir_archivo::create([
            'nombre_archivo' => $nombreArchivo,
            'ruta_archvo' => $rutaArchivo,
            'fecha_subida' => now(),
            'tipo_archivo' => $archivo->getClientMimeType(),
            // 'archivo_id' => $archivo->id,
            'archivo_id' => $archivoModel->id,
            // 'usuarios_id' => auth()->id(),
            'usuarios_id' => $request->usuarios_id,
        ]);
        


        return response()->json(['message' => 'Archivo subido exitosamente', 'archivo' => $subirArchivo]);
    }

    public function verArchivos(){
        $archivos = subir_archivo::with('users','archivos.areas')->get();
        return $archivos;

    }
    public function descargarArchivos($id){
        $archivo = subir_archivo::findOrFail($id);
        $rutaArchivo = $archivo->ruta_archvo;

        if(!Storage::exists($rutaArchivo)){
            return response()->json(['message' => 'Archivo no encontrado'], 404);

        }
        return Storage::download($rutaArchivo, $archivo->nombre_archivo);

    }

    public function eliminarArchivo(string $id){
      
        $archivo = subir_archivo::findOrFail($id);
        if($archivo){
            $archivo->delete();
            return redirect()->route('ver.archivos')->with('success','archivo eliminado correctamente');
        }
        return response()->json(['message'=>'archivo no encotrado']);

    }

   public function edit(string $id){
    $users = User::all();
    $Areas = area::all();
    $Archv = subir_archivo::with(['users', 'archivos.areas',])->find($id);
    return view('dashboard.editar', compact('Archv','users','Areas'));

   }


    public function visualizarArchivo($id){
        $archivo = subir_archivo::findOrFail($id);
        $rutaArchivo = $archivo->ruta_archvo;
        if(!Storage::exists($rutaArchivo)){
            return response()->json(['message' => 'Archivo no encontrado'], 404);

        }
        $urlArchivo = Storage::url($archivo->ruta_archvo);
        // dd($urlArchivo);
        return response()->json(['url' => $urlArchivo]);
       
    }
    public function actualizarDatos(Request $request)
    {
        // Obtener los IDs desde la petición
        $area_id = $request->input('area_id');
        $archivo_id = $request->input('archivo_id');
        $subir_archivo_id = $request->input('subir_archivo_id');
    
        // Validar la solicitud
        $request->validate([
            'area_nombre' => 'required|string|max:255',
            'archivo_descripcion' => 'required|string|max:255',
            'archivo' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'usuarios_id' => 'required',
        ]);
    
        // Buscar y actualizar el área
        $area = area::findOrFail($area_id);
        $area->update([
            'nombre' => $request->area_nombre,
        ]);
    
        // Buscar y actualizar el archivo
        $archivoModel = archivo::findOrFail($archivo_id);
        $archivoModel->update([
            'descripcion' => $request->archivo_descripcion,
            'users_id' => $request->usuarios_id,
        ]);
    
        // Si se ha subido un nuevo archivo, actualizar la información
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $rutaArchivo = $archivo->storeAs('public/archivos', $nombreArchivo);
    
            // Buscar y actualizar la entrada en subir_archivo
            $subirArchivo = subir_archivo::findOrFail($subir_archivo_id);
            $subirArchivo->update([
                'nombre_archivo' => $nombreArchivo,
                'ruta_archvo' => $rutaArchivo,
                'fecha_subida' => now(),
                'tipo_archivo' => $archivo->getClientMimeType(),
                'usuarios_id' => $request->usuarios_id,
            ]);
        }
    
        return response()->json(['message' => 'Datos actualizados exitosamente']);
    }
    
   

 
}



