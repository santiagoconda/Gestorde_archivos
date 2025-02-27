<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subir_archivo extends Model
{
public $timestamps = false;

  protected $fillable=[
    'nombre_archivo',
    'ruta_archvo',
    'fecha_subida',
    'tipo_archivo',
    'archivo_id',
    'usuarios_id',

];
public function archivos(){
    return $this->hasMany(archivo::class,'archivo_id');
}

public function users(){
    return $this->belongsTo(User::class, 'usuarios_id'); // 'usuarios_id' es la clave foránea
}
}
