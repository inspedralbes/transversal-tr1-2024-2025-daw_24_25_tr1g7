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
        Schema::table('comandas', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('idShippingAddress')->nullable()->after('idUser'); // Cambia 'id' por la columna que corresponda
            $table->foreign('idShippingAddress')->references('id')->on('shipping_addresses');

            $table->unsignedBigInteger('idBillingAddress')->nullable()->after('idUser'); // Cambia 'id' por la columna que corresponda
            $table->foreign('idBillingAddress')->references('id')->on('billing_addresses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comandas', function (Blueprint $table) {
            //
            $table->dropForeign(['idShippingAddress']);
            $table->dropColumn('idShippingAddress');
            $table->dropForeign(['idBillingAddress']);
            $table->dropColumn('idBillingAddress');
        });
    }
};
