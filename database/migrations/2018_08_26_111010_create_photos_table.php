<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration
{
    public function up()
    {
        Schema::create('photos', function (Blueprint $table){
          $table->increments('id');
          $table->string('nama');
          $table->string('slug');
          $table->string('thumbnail');
          $table->string('small');
          $table->string('medium');
          $table->string('large');
          $table->integer('price_small');
          $table->integer('price_medium');
          $table->integer('price_large');
          $table->integer('active')->default(0);
          $table->integer('id_category')->unsigned();
          $table->integer('id_user')->unsigned();
          $table->timestamps();

          $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
