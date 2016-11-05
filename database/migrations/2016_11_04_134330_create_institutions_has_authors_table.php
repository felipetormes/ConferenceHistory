<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutionsHasAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutions_has_authors', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->integer('institution_id')->unsigned();
            $table->integer('author_id')->unsigned();

            $table->primary(['institution_id', 'author_id']);

            $table->foreign('institution_id')->references('id')->on('institutions')
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
        Schema::drop('institutions_has_authors');
    }
}
