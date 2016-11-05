<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperHasKeywordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_has_keywords', function (Blueprint $table) {
            $table->integer('paper_id')->unsigned();
            $table->integer('keyword_id')->unsigned();

            $table->primary(['paper_id', 'keyword_id']);

            $table->foreign('paper_id')->references('id')->on('papers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('keyword_id')->references('id')->on('keywords')
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
        Schema::drop('paper_has_keywords');
    }
}
