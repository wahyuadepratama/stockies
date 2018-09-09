<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('id_photo')->unsigned();
          $table->integer('id_transaksi')->unsigned();
          $table->integer('price');
          $table->string('ukuran');
          $table->string('path');
          $table->timestamps();

          $table->foreign('id_photo')->references('id')->on('photos')->onDelete('cascade')->onUpdate('cascade');
          $table->foreign('id_transaksi')->references('id')->on('transactions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
