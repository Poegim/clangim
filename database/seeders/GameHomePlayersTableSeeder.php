<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameHomePlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('game_home_players')->insert([

            // 1v1
            [
                'user_id' => 2,
                'game_id' => 1,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //2v2
            [
                'user_id' => 2,
                'game_id' => 2,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => 3,
                'game_id' => 2,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //3v3
            [
                'user_id' => 3,
                'game_id' => 3,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            [
                'user_id' => 2,
                'game_id' => 3,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            [
                'user_id' => 4,
                'game_id' => 3,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            //4v4
            [
                'user_id' => 4,
                'game_id' => 4,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            [
                'user_id' => 5,
                'game_id' => 4,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            [
                'user_id' => 3,
                'game_id' => 4,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],            [
                'user_id' => 2,
                'game_id' => 4,
                'clan_war_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

        ]);
    }
}
