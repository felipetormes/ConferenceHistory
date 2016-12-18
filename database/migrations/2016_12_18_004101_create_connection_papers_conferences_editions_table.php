<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionPapersConferencesEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_2s', function (Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->integer('paper_id')->unsigned()->nullable();
            $table->integer('conf_id')->unsigned()->nullable();
            $table->integer('edi_id')->unsigned()->nullable();

            //$table->primary(['connect_id', 'paper_id', 'conf_id', 'edi_id']);

            $table->foreign('paper_id')->references('id')->on('papers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('conf_id')->references('id')->on('conferences')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('edi_id')->references('id')->on('editions')
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
        Schema::drop('connection_2s');
    }
}
