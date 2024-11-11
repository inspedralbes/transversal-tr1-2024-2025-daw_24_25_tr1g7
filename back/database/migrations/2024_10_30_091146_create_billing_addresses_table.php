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
        Schema::create('billing_addresses', function (Blueprint $table) {
            $table->id();
            $table-> unsignedBigInteger('idUser');
            $table-> string('name')->nullable();
            $table-> string('last_name')->nullable();
            $table-> string('company')->nullable();
            $table-> integer('phone_number');
            $table-> string('dni_nie')->nullable();
            $table-> string('cif')->nullable();
            $table-> integer('zip_code');
            $table-> string('population');
            $table-> string('city');
            $table-> string('street');
            $table-> string('number');
            $table-> string('floor')->nullable();
            $table-> string('door')->nullable();
            $table->boolean('default')->default(false);
            $table->enum('invoice', ['particular', 'autonomo', 'empresa']);
            $table->timestamps();

            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_addresses');
    }
};
