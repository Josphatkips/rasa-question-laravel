<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Adduid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('failed_questions', function (Blueprint $table) {
            //
            $table->string('uid')->nullable();
            $table->string('helpful')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('failed_questions', function (Blueprint $table) {
            //
            $table->dropColumn('uid');
            $table->dropColumn('helpful');
        });
    }
}
