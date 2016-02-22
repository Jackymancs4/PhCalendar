<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->char('name', 50);
            $table->text('description');
            $table->timestamps();
            $table->integer('duration');
            $table->boolean('done')->default(false);
            $table->integer('pool')->unsigned();;
            $table->integer('parent')->unsigned();;
            $table->integer('priority')->default(5);

            $table->foreign('pool')->references('id')->on('pools');
            $table->foreign('parent')->references('id')->on('todos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('todos');
    }
}
