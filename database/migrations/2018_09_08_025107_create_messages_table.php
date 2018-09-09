<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
          $table->increments('id');
          $table->text('body');
          $table->integer('sender')->unsigned();
          $table->integer('receiver')->unsigned();
          $table->integer('status')->default(0);
          $table->timestamps();

          $table->foreign('sender')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('receiver')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
