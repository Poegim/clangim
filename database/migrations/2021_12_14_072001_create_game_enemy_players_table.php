<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameEnemyPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_enemy_players', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('game_id')->constrained('games')->onDelete('cascade');
            $table->foreignId('clan_war_id')->constrained('clan_wars')->onDelete('cascade');
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
        Schema::dropIfExists('game_enemy_players');
    }
}
