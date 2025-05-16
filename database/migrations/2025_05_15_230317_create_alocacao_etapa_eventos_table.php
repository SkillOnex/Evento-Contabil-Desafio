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
        Schema::create('alocacao_etapa_eventos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pessoa_participante_id')->constrained()->onDelete('cascade');
            $table->foreignId('sala_treinamento_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('espaco_cafe_id')->nullable()->constrained('espaco_cafes')->onDelete('set null');


            $table->tinyInteger('etapa')->comment('1 ou 2');

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
        Schema::dropIfExists('alocacao_etapa_eventos');
    }
};
