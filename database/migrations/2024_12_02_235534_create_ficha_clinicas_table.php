<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->string('tipo_sangre')->nullable(); // Tipo de sangre
            $table->text('vacunas')->nullable(); // Vacunas
            $table->string('alergias')->nullable(); // Alergias
            $table->decimal('peso', 8, 2)->nullable(); // Peso
        });
    }
    
    public function down()
    {
        Schema::table('mascotas', function (Blueprint $table) {
            $table->dropColumn(['tipo_sangre', 'vacunas', 'alergias', 'peso']);
        });
    }
    
};
