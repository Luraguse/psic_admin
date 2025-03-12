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
        Schema::table('tareas_pacientes', function (Blueprint $table) {
            $table->dropColumn("respuesta");
            $table->dropColumn("recurso");
            $table->text("respuesta")->nullable()->default(null);
            $table->text("recurso")->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas_pacientes', function (Blueprint $table) {
            //
        });
    }
};
