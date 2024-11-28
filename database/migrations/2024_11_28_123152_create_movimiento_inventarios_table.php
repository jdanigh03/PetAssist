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
        Schema::create('movimiento_inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('producto_id')->constrained('productos_petshop', 'ID_Producto')->onDelete('cascade'); // Referencia a 'ID_Producto' en lugar de 'id'
            $table->integer('cantidad'); // La cantidad añadida
            $table->decimal('precio', 8, 2); // El precio del producto
            $table->timestamp('fecha_hora')->useCurrent(); // Fecha y hora de ingreso
            $table->string('accion'); // Acción de ingreso o salida
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimiento_inventarios');
    }
};
    