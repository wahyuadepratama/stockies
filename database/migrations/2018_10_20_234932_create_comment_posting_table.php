<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentPostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_posting', function (Blueprint $table) {
          $table->increments('id');
          $table->text('body');
          $table->integer('id_user')->unsigned();
          $table->integer('id_posting')->unsigned();
          $table->timestamps();

          $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('id_posting')->references('id')->on('posting')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comment_posting');
    }
}
