<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clan_war_id');
            $table->foreign('clan_war_id')->references('id')->on('clan_wars')->onDelete('cascade');
            $table->tinyInteger('type');
            $table->tinyInteger('result')->nullable();
            $table->unsignedBigInteger('home_player_1')->nullable();
            $table->unsignedBigInteger('home_player_2')->nullable();
            $table->unsignedBigInteger('home_player_3')->nullable();
            $table->unsignedBigInteger('home_player_4')->nullable();
            $table->string('enemy_player_1')->nullable();
            $table->string('enemy_player_2')->nullable();
            $table->string('enemy_player_3')->nullable();
            $table->string('enemy_player_4')->nullable();
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
        Schema::dropIfExists('games');
    }
}
