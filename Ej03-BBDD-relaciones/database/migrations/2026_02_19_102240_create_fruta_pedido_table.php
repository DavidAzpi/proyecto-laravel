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
        Schema::create('fruta_pedido', function (Blueprint $table) {

            $table->foreignId('fruta_id')
                ->constrained('frutas')
                ->onDelete('cascade');

            $table->foreignId('pedido_id')
                ->constrained('pedidos')
                ->onDelete('cascade');

            $table->integer('cantidad');

            $table->primary(['fruta_id', 'pedido_id']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('fruta_pedido');
    }

};
