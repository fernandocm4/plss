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
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');

            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('situacao_id');

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('situacao_id')->references('id')->on('situacoes');

            $table->datetime('prazo_solucao');
            $table->datetime('data_criacao');
            $table->datetime('data_solucao')->nullable();
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamados');
    }
};
