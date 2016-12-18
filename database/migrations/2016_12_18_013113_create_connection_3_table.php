<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnection3Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_3s', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('connect_1_id')->unsigned();
            $table->integer('connect_2_id')->unsigned();

            $table->primary(['connect_1_id', 'connect_2_id']);

            $table->foreign('connect_1_id')->references('id')->on('connection_1s')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('connect_2_id')->references('id')->on('connection_2s')
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
        Schema::drop('connection_3s');
    }
}
