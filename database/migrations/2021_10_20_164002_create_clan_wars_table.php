<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClanWarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clan_wars', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->datetime('date');
            $table->unsignedBigInteger('user_id');
            $table->integer('one_vs_one')->default(0);
            $table->integer('two_vs_two')->default(0);
            $table->integer('three_vs_three')->default(0);
            $table->integer('four_vs_four')->default(0);
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
        Schema::dropIfExists('clan_wars');
    }
}
