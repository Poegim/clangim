<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replays', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('file');
            $table->integer('players_count');
            $table->string('player_1')->nullable();
            $table->integer('player_1_team')->nullable();
            $table->string('player_1_race')->nullable();
            $table->integer('player_1_apm')->nullable();
            $table->integer('player_1_eapm')->nullable();
            $table->string('player_2')->nullable();
            $table->integer('player_2_team')->nullable();
            $table->string('player_2_race')->nullable();
            $table->integer('player_2_apm')->nullable();
            $table->integer('player_2_eapm')->nullable();
            $table->string('player_3')->nullable();
            $table->integer('player_3_team')->nullable();
            $table->string('player_3_race')->nullable();
            $table->integer('player_3_apm')->nullable();
            $table->integer('player_3_eapm')->nullable();
            $table->string('player_4')->nullable();
            $table->integer('player_4_team')->nullable();
            $table->string('player_4_race')->nullable();
            $table->integer('player_4_apm')->nullable();
            $table->integer('player_4_eapm')->nullable();
            $table->string('player_5')->nullable();
            $table->integer('player_5_team')->nullable();
            $table->string('player_5_race')->nullable();
            $table->integer('player_5_apm')->nullable();
            $table->integer('player_5_eapm')->nullable();
            $table->string('player_6')->nullable();
            $table->integer('player_6_team')->nullable();
            $table->string('player_6_race')->nullable();
            $table->integer('player_6_apm')->nullable();
            $table->integer('player_6_eapm')->nullable();
            $table->string('player_7')->nullable();
            $table->integer('player_7_team')->nullable();
            $table->string('player_7_race')->nullable();
            $table->integer('player_7_apm')->nullable();
            $table->integer('player_7_eapm')->nullable();
            $table->string('player_8')->nullable();
            $table->integer('player_8_team')->nullable();
            $table->string('player_8_race')->nullable();
            $table->integer('player_8_apm')->nullable();
            $table->integer('player_8_eapm')->nullable();
            $table->string('winnner')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('replays');
    }
}
