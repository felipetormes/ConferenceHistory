<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperHasInstitutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paper_has_institutions', function (Blueprint $table) {
            $table->integer('paper_id')->unsigned();
            $table->integer('institution_id')->unsigned();

            $table->primary(['paper_id', 'institution_id']);

            $table->foreign('paper_id')->references('id')->on('papers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('institution_id')->references('id')->on('institutions')
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
        Schema::drop('paper_has_institutions');
    }
}
