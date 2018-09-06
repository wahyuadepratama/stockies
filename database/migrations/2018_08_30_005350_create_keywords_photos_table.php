<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeywordsPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keywords_photos', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_keyword')->unsigned();
          $table->integer('id_photo')->unsigned();
          $table->timestamps();

          $table->foreign('id_keyword')->references('id')->on('keywords')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('id_photo')->references('id')->on('photos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords_photos');
    }
}
