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
        $table->date('nacimiento')->nullable()->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('mascotas', function (Blueprint $table) {
        $table->date('nacimiento')->nullable(false)->change(); // Regresar a no nulo
    });
}
};
