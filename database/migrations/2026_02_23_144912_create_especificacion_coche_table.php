<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('especificacion_coche', function (Blueprint $table) {
            $table->foreignId('coche_id')->constrained()->onDelete('cascade');
            $table->foreignId('especificacion_id')->constrained('especificaciones')->onDelete('cascade');
            $table->string('valor')->nullable();
            $table->primary(['coche_id', 'especificacion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especificacion_coche');
    }
};
