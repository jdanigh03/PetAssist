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
    Schema::create('mascotas', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->date('nacimiento');
        $table->unsignedBigInteger('raza_id');
        $table->unsignedBigInteger('user_id');
        $table->string('foto')->nullable();
        $table->timestamps();

        $table->foreign('raza_id')->references('id')->on('razas')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
