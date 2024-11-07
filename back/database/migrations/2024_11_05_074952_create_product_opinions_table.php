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
        Schema::create('product_opinions', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger('idUser');
            $table-> unsignedBigInteger('idProductes');
            $table-> float('opinion_number');
            $table-> string('opinion')->nullable();
            $table-> text('img')->nullable();
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idProductes')->references('id')->on('productes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_opinions');
    }
};
