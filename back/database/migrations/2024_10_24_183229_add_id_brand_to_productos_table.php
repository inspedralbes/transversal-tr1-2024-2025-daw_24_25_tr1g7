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
        Schema::table('productes', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('idBrand')->nullable()->after('id'); // Cambia 'id' por la columna que corresponda

            // Establecer la relación de clave foránea
            $table->foreign('idBrand')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('productes', function (Blueprint $table) {
            // Eliminar la relación de clave foránea y la columna idBrand
            $table->dropForeign(['idBrand']);
            $table->dropColumn('idBrand');
        });
    }
};
