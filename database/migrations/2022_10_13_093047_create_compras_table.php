<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('od_producto');
            $table->unsignedBigInteger('od_user');
            $table->unsignedBigInteger('od_factura')->nullable();

            $table->foreign('od_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('od_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('od_factura')->references('id')->on('facturas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
    }
};
