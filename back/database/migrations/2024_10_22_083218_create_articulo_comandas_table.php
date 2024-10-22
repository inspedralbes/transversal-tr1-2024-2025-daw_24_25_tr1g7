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
        Schema::create('articulo_comandas', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger('idOrder');
            $table-> unsignedBigInteger('idProduct');
            $table-> integer('num_product');
            $table->timestamps();

            $table->foreign('idOrder')->references('id')->on('comandas');
            $table->foreign('idProduct')->references('id')->on('productes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo_comandas');
    }
};
