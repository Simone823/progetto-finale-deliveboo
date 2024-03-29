<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plate', function (Blueprint $table) {
            //creazione colonne
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('plate_id');
            $table->integer('quantity')->default(0);

            //assegnazione FK
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');

            //assegnazione PK
            $table->primary(['order_id', 'plate_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_plate');
    }
}
