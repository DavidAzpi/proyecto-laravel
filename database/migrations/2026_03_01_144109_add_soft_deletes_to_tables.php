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
        $tables = ['coches', 'marcas', 'especificaciones'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $tableBlueprint) use ($table) {
                if (!Schema::hasColumn($table, 'deleted_at')) {
                    $tableBlueprint->softDeletes();
                }
            });
        }
    }

    /**
     * Revierte las migraciones
     */
    public function down(): void
    {
        $tables = ['coches', 'marcas', 'especificaciones'];

        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $tableBlueprint) use ($table) {
                if (Schema::hasColumn($table, 'deleted_at')) {
                    $tableBlueprint->dropSoftDeletes();
                }
            });
        }
    }
};
