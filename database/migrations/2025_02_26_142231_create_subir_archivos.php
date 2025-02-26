<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subir_archivos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_archivo');
            $table->string('ruta_archvo');
            $table->date('fecha_subida')->nullable();
            $table->string('tipo_archivo');
            $table->unsignedBigInteger('archivo_id')->nullable(); 
            $table->unsignedBigInteger('usuarios_id')->nullable(); 
            $table->foreign('archivo_id')->references('id')->on('archivos')->onDelete('cascade'); 
            $table->foreign('usuarios_id')->references('id')->on('users')->onDelete('cascade'); 


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subir_archivos');
    }
};
