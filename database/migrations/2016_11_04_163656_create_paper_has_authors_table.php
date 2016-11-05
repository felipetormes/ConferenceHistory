<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperHasAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_has_authors', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('paper_id')->unsigned();
            $table->integer('author_id')->unsigned();

            $table->primary(['paper_id', 'author_id']);

            $table->foreign('paper_id')->references('id')->on('papers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paper_has_authors');
    }
}
