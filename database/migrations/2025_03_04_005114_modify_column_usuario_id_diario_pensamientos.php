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
        Schema::dropIfExists('diario_pensamientos');
        Schema::create('diario_pensamientos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('users');
            $table->text('texto');
            $table->integer("paciente_id");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diario_pensamientos', function (Blueprint $table) {
            $table->drop("usuario_id");
        });
    }
};
