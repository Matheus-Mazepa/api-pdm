<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street');
            $table->string('district');
            $table->string('city');
            $table->string('state');
            $table->timestamps();
        });

        Schema::create('game_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('max_players');
            $table->text('description');
            $table->boolean('its_free')->default(false);
            $table->float('price', 8, 2)->nulable();
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('id')->on('address');
            $table->integer('responsible_user_id')->unsigned();
            $table->foreign('responsible_user_id')->references('id')->on('users');

            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');

            $table->timestamps();
        });

        Schema::create('user_game', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('game_id')->unsigned();
            $table->foreign('game_id')->references('id')->on('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_game');
        Schema::dropIfExists('games');
        Schema::dropIfExists('game_categories');
        Schema::dropIfExists('address');
    }
}
