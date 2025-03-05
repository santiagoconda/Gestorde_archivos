<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    public $timestamps = false;

    protected $table = 'roles';
    protected $fillable = [
        'nombre','crear','ver','actalizar','eliminar'
    ];

    public function usuarios() {
        return $this->hasMany(User::class, 'rol_id');
    }

    
}
