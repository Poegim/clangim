<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory;

class ClanWarsTableSeeder extends Seeder
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
            DB::table('clan_wars')->insert([
                [
                    'title' => 'PW vs 404 (BWSL 27)',
                    'enemy_flag' => array_rand(config('countries.country_list'), 1),
                    'date' => $this->faker->dateTimeBetween(now(), '+1 month'),
                    'user_id' => rand(2,3),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ],
            ]);
        } elseif(config('app.seed.type') == "deploy")
        {
            //
        } elseif(config('app.seed.type') == "tests")
        {
            for ($i=0; $i < 20; $i++) {
                DB::table('clan_wars')->insert([
                    [
                        'title' => $this->faker->realTextBetween(5,20),
                        'enemy_flag' => array_rand(config('countries.country_list'), 1),
                        'date' => $this->faker->dateTimeBetween('-4 year', '+1 month'),
                        'user_id' => rand(2,3),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ],
                ]);
            }
        }

    }
}
