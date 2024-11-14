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
        Schema::create('productos_petshop', function (Blueprint $table) {
            $table->id('ID_Producto');
            $table->string('Nombre');
            $table->text('Descripcion')->nullable();
            $table->decimal('Precio', 10, 2);
            $table->string('Imagen')->nullable();
            $table->string('Categoria');
            $table->integer('Cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos_petshop');
    }
};