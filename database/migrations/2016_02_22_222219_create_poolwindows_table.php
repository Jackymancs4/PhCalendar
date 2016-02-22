<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolwindowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poolwindows', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pool')->unsigned();;
            $table->time('start_time');
            $table->time('end_time');

            $table->foreign('pool')->references('id')->on('pools');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('poolwindows');
    }
}
