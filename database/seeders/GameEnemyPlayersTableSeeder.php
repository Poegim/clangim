<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameEnemyPlayersTableSeeder extends Seeder
{

    protected $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker = Factory::create();

        if(config('app.seed.type') == "demo")
        {
            DB::table('game_enemy_players')->insert([

                // 1v1
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 1,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                // 1v1
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 2,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                // 1v1
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 3,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                // 1v1
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 4,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                //2v2
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 5,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 5,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                //2v2
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 6,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 6,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                //3v3
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 7,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 7,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 7,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                //4v4
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 8,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 8,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 8,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 8,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

            ]);
        } elseif(config('app.seed.type') == "deploy")
        {

        } elseif(config('app.seed.type') == "tests")
        {
            DB::table('game_enemy_players')->insert([

                // 1v1
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 1,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                //2v2
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 2,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 2,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                //3v3
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 3,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 3,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 3,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

                //4v4
                [
                    'name' => $this->faker->userName(),
                    'game_id' => 4,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 4,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 4,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],            [
                    'name' => $this->faker->userName(),
                    'game_id' => 4,
                    'clan_war_id' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],

            ]);
        }


    }
}
