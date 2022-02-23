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

        for ($i=0; $i < 1300; $i++) {
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
