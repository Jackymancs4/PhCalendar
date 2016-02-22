<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->char('title', 50);
            $table->text('description');
            $table->timestamps();   
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('repetition', ['none', 'annual', 'monthly', 'daily'])->default('none');
            $table->enum('type_repetition', ['add', 'sub']);
            $table->enum('type', ['1','2','3','4']);
            $table->boolean('partecipated')->default(false);
            $table->text('note');
            $table->integer('priority')->default(5);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
