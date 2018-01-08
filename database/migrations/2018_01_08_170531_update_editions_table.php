<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateEditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('editions', function (Blueprint $table) {
          $table->date('started_at')->nullable();
          $table->date('ended_at')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('editions', function (Blueprint $table) {
          $table->dropColumn(['started_at','ended_at']);
      });
    }
}
