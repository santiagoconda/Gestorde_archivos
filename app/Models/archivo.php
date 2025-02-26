<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class archivo extends Model
{
 protected $fillable = [
    'descripcion',
    'estado',
    'area_id',
    'users_id',
];
public function areas(){
    return $this->hashMany(area::class, 'area_id');
}

public function users(){
    return $this->hasMany(User::class,'users_id');
}
}
