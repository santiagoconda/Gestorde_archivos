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
        $areas = area::all();
        return view('archivos.subirarchivos',compact('areas'));

        
    }
   
    public function crearAreas(Request $request){

        // dd($request);
        $request->validate([
            'nombre' => 'required|string|',
            'estado' => 'nullable|integer'
        ]);
        $areas=area::create([
            'nombre' => $request->nombre,
            'estado' => $request->estado ?? 1
        ]);
        return view('dashboard.confirmacion');

    }

    public function guarDardatos(Request $request){
        $user = auth()->user(); 
        // dd($user->toArray());
        if (!$user || !$user->roles || !$user->roles->crear) {
            return redirect()->route('ver.archivos')->with('error', 'No tienes permiso para editar archivos.');
        }
        // dd($request);
        $request->validate([
            'id_area' => 'required|string|max:255',
            'archivo_descripcion' => 'required|string|max:255',
            'archivo' => 'required|file|mimes:pdf,jpg,png|max:2048',
            'id_usuario' => 'required',

        ]);

        $archivoModel = archivo::create([
            'descripcion' =>$request->archivo_descripcion,
            'estado'=>1,
            'area_id'=>$request->id_area,
            'users_id'=>$request->id_usuario,
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
            'archivo_id' => $archivoModel->id,
            // 'usuarios_id' => auth()->id(),
            'usuarios_id' => $request->id_usuario,
        ]);
        


        return view('dashboard.confirmacion');    }
//    Funcion que trae todos los datos delos archivos
    public function verArchivos(){
        $archivos = subir_archivo::with('users','archivos.areas')->get();
        return $archivos;

    }
// Funcion para filtrar los archivos por areas.
    public function verArchivosFiltro($areaId = 1) {
        return subir_archivo::with('users', 'archivos.areas')
            ->whereHas('archivos', function ($query) use ($areaId) {
                $query->where('area_id', $areaId);
            })
            ->get();
    }
// funcion para filtrar archivos, menos losque se le espesifican en elparametro
    public function verArchivosAreas($excluirAreaIds = [2]) {
        return subir_archivo::with('users', 'archivos.areas')
            ->whereHas('archivos', function ($query) use ($excluirAreaIds) {
                $query->whereNotIn('area_id', $excluirAreaIds);
            })
            ->get();
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

        $user = auth()->user(); 
        // dd($user->toArray());
        if (!$user || !$user->roles || !$user->roles->eliminar) {
        return redirect()->route('welcome.alert')->with('error', 'No tienes permiso para eliminar archivos.');
        }
      
        $archivo = subir_archivo::findOrFail($id);
        if($archivo){
            $archivo->delete();
            return view('dashboard.confirmacion');        }
        return response()->json(['message'=>'archivo no encotrado']);

    }

  

    public function edit(string $id){
        $user = auth()->user(); 
        // dd($user->toArray());
        if (!$user || !$user->roles || !$user->roles->	actalizar) {
            return redirect()->route('welcome.alert')->with('error', 'No tienes permiso para editar archivos.');
        }
        
        $users = User::all();
        $Areas = area::all();
        $Archv = subir_archivo::with(['users', 'archivos.areas',])->find($id);
     return view('dashboard.editar', compact('Archv','users','Areas'));

    }

    
    public function editarconPermisos(string $id){
        $user = auth()->user(); 
        // dd($user->toArray());
        if (!$user || !$user->roles || !$user->roles->	actalizar) {
            return redirect()->route('welcome.alert')->with('error', 'No tienes permiso para editar archivos.');
        }
        
        $users = User::all();
        $Areas = area::all();
        $Archv = subir_archivo::with(['users', 'archivos.areas',])->find($id);
     return view('archivos.editar', compact('Archv','users','Areas'));

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
        // dd($request);
      
        $area_id = $request->input('area_id');
        $archivo_id = $request->input('archivo_id');
        $subir_archivo_id = $request->input('subir_archivo_id');
    
        $request->validate([
            'area_nombre' => 'required|string|max:255',
            'archivo_descripcion' => 'required|string|max:255',
            'archivo' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'usuarios_id' => 'required',
        ]);
    
        $area = area::findOrFail($area_id);
        $area->update([
            'nombre' => $request->area_nombre,
        ]);
    
        $archivoModel = archivo::findOrFail($archivo_id);
        $archivoModel->update([
            'descripcion' => $request->archivo_descripcion,
            'users_id' => $request->usuarios_id,
        ]);
    
        if ($request->hasFile('archivo')) {
            $archivo = $request->file('archivo');
            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();
            $rutaArchivo = $archivo->storeAs('public/archivos', $nombreArchivo);
    
            $subirArchivo = subir_archivo::findOrFail($subir_archivo_id);
            $subirArchivo->update([
                'nombre_archivo' => $nombreArchivo,
                'ruta_archvo' => $rutaArchivo,
                'fecha_subida' => now(),
                'tipo_archivo' => $archivo->getClientMimeType(),
                'usuarios_id' => $request->usuarios_id,
            ]);
        }
    
        return view('dashboard.confirmacion');   
    }
    
   

 
}



