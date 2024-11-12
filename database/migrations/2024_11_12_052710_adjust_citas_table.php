<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->renameColumn('mascota', 'ID_Animal');
            $table->renameColumn('fecha', 'Fecha_Hora'); // Esto asume que 'fecha' almacenaba la fecha y hora combinadas
            $table->dropColumn('hora'); // Elimina la columna 'hora' ya que ahora usas 'Fecha_Hora'
            $table->renameColumn('veterinario', 'ID_Veterinario');
        });
    }

    public function down()
    {
        Schema::table('citas', function (Blueprint $table) {
            $table->renameColumn('ID_Animal', 'mascota');
            $table->renameColumn('Fecha_Hora', 'fecha');
            $table->string('hora'); // Restaura la columna 'hora'
            $table->renameColumn('ID_Veterinario', 'veterinario');


        });
    }
};