<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClanWarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clan_wars')->insert([

            [
                'title' => 'We vs Them',
                'date' => '2021-10-07 00:00:00',
                'user_id' => 2,
                'one_vs_one' => 2,
                'two_vs_two' => 2,
                'three_vs_three' => 2,
                'four_vs_four' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
