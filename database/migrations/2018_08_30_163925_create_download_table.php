<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadTable extends Migration
{
    public function up()
    {
        Schema::create('download', function (Blueprint $table){
            $table->increments('id');
            $table->integer('downloaded');
            $table->integer('id_user')->unsigned();
            $table->integer('id_photo')->unsigned();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_photo')->references('id')->on('photos')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
