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
    Schema::create('razas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->unsignedBigInteger('especie_id');
        $table->text('caracteristicas')->nullable();
        $table->timestamps();

        $table->foreign('especie_id')->references('id')->on('especies')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razas');
    }
};
