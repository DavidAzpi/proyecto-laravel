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
        Schema::create('coche_especificacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coche_id')->constrained('coches')->onDelete('cascade');
            $table->foreignId('especificacion_id')->constrained('especificacions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coche_especificacion');
    }
};
