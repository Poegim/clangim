<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if(config('app.seed.type') == "demo")
        {
            DB::table('games')->insert([

                [
                    'clan_war_id' => 1,
                    'type' => 1,
                    'result' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 1,
                    'result' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 1,
                    'result' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 1,
                    'result' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 2,
                    'result' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 2,
                    'result' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 3,
                    'result' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 4,
                    'result' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

            ]);
        } elseif(config('app.seed.type') == "deploy")
        {

        } elseif(config('app.seed.type') == "tests")
        {
            DB::table('games')->insert([

                [
                    'clan_war_id' => 1,
                    'type' => 1,
                    'result' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 2,
                    'result' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 3,
                    'result' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'clan_war_id' => 1,
                    'type' => 4,
                    'result' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

            ]);
        }

        // Game::factory()->count(4)->create();

    }
}
