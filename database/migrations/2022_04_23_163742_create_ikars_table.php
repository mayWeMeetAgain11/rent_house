<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIkarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ikars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('region');
            $table->string('address');
            $table->string('city');
            $table->string('show_type');
            $table->string('type');
            $table->string('price');
            $table->integer('space');
            $table->integer('user_id')->unsigned();
            $table->integer('floors_number');
            $table->integer('room_number');
            $table->string('status');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ikars');
    }
}
