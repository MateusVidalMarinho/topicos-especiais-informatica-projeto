<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColecaoLivroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colecao_livro', function (Blueprint $table) {
            $table->id();

            $table->integer('livro_id')->unsigned()->index();
            $table->foreign('livro_id')->references('id')->on('livros')->onDelete('cascade');

            $table->integer('colecao_id')->unsigned()->index();
            $table->foreign('colecao_id')->references('id')->on('colecoes')->onDelete('cascade');

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
        Schema::dropIfExists('colecao_livro');
    }
}
