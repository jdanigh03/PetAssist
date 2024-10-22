<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitasTable extends Migration
{
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('mascota');
            $table->date('fecha');
            $table->time('hora');
            $table->string('motivo');
            $table->string('veterinario');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con el usuario
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('citas');
    }
}
