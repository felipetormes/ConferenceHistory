<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConnectionAuthorsInstitutionsDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('connection_1s', function (Blueprint $table){
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->integer('author_id')->unsigned()->nullable();
            $table->integer('inst_id')->unsigned()->nullable();
            $table->integer('depart_id')->unsigned()->nullable();

            //$table->primary(['connect_id', 'author_id', 'inst_id', 'depart_id']);

            $table->foreign('author_id')->references('id')->on('authors')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('inst_id')->references('id')->on('institutions')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('depart_id')->references('id')->on('departments')
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
        Schema::drop('connection_1s');
    }
}
