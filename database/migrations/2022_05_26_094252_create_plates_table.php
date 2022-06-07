<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //migration della tabella 'plates'
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('slug', 255)->unique();
            $table->string('ingredients');
            $table->float('price', 5,2);
            $table->string('image')->nullable();
            $table->boolean('visibility')->default(1);
            $table->tinyInteger('quantity')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('plates');
    }
}
