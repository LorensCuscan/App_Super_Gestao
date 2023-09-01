<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //adicionando a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contato_id');
        });
        //atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update site_contatos set motivo_contato_id = motivo_contato');

        //criando fk e remover coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contato_id')->references('id')->on('motivo_contato');
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //criar coluna motivo_contato

        Schema::table('site_contatos', function (Blueprint $table){
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contato_id_foreign');
        });
        //atribuindo motivo_contato_id para a coluna motivo_contato
        DB::statement('update site_contatos set motivo_contato_id = motivo_contato_id');
        //removendo a coluna motivo_contato_id
        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_contato_id');
        });
    }
};
