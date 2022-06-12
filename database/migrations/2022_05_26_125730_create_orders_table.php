<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('guest_name', 150);
            $table->string('guest_surname', 150);
            $table->string('guest_city', 150);
            $table->string('guest_cap', 5);
            $table->string('guest_adress', 255);
            $table->string('guest_email', 255);
            $table->string('guest_phone', 15);
            $table->bigInteger('user_id');
            $table->decimal('total_price', 10,2);
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
