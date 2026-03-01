<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Ejecuta las migraciones
     */
    public function up(): void
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->string('slogan')->nullable();
            $table->text('descripcion')->nullable();
        });
    }

    /**
     * Revierte las migraciones
     */
    public function down(): void
    {
        Schema::table('marcas', function (Blueprint $table) {
            $table->dropColumn(['slogan', 'descripcion']);
        });
    }
};
