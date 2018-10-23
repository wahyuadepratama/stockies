<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posting', function (Blueprint $table) {
          $table->increments('id');
          $table->string('judul');
          $table->longText('isi');
          $table->string('slug');
          $table->string('foto')->default('no_image.png');
          $table->integer('id_user')->unsigned();
          $table->integer('id_kategori')->unsigned();
          $table->timestamps();

          $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('id_kategori')->references('id')->on('categori_posting')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posting');
    }
}
