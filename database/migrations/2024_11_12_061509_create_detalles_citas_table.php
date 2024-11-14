<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalles_citas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cita_id'); // Clave foránea para la cita
            $table->text('tratamiento')->nullable();
            $table->text('medicamentos')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('pruebas_realizadas')->nullable();
            $table->timestamps();

            $table->foreign('cita_id')->references('id')->on('citas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalles_citas');
    }
};