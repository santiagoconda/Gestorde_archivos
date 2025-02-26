<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subir_archivo extends Model
{
  protected $fillable=[
    'nombre_archivo',
    'ruta_archivo',
    'fecha_subida',
    'tipo_archivo',
    'archivo_id',
    'usuarios_id',  
];
public function archivos(){
    return $this->hasMany(archivo::class,'archivo_id');
}

public function users(){
    return $this->hasMany(User::class,'usuarios_id');
}
}
