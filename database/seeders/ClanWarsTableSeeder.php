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
                'title' => 'BWCL vs ABC',
                'date' => '2021-10-07 00:00:00',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'BWCL vs MyM',
                'date' => '2021-11-23 11:00:00',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'STPL R8 vs ToT',
                'date' => '2021-12-23 09:10:00',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'STPL vs YXA',
                'date' => '2022-02-07 17:00:00',
                'user_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'STPL vs YXA',
                'date' => '2022-03-11 19:00:00',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'BWCL vs AAA',
                'date' => '2022-02-01 00:00:00',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'We vs Them',
                'date' => '2022-02-02 12:00:00',
                'user_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
