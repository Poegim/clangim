<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $replays = array(
            array('title' => 'Draco vs Sparkyz Leta',
            'file' => '../storage/app/public/replays/draco.rep',
            'players_count' => '2',
            'downloads_counter' => '7',
            'player_1' => 'Draco',
            'player_1_team' => '1',
            'player_1_race' => 'Protoss',
            'player_1_apm' => '219',
            'player_1_eapm' => '161',
            'player_2' => 'Sparkyz Leta',
            'player_2_team' => '1',
            'player_2_race' => 'Terran',
            'player_2_apm' => '292',
            'player_2_eapm' => '179',
            'player_3' => NULL,
            'player_3_team' => NULL,
            'player_3_race' => NULL,
            'player_3_apm' => NULL,
            'player_3_eapm' => NULL,
            'player_4' => NULL,
            'player_4_team' => NULL,
            'player_4_race' => NULL,
            'player_4_apm' => NULL,
            'player_4_eapm' => NULL,
            'player_5' => NULL,
            'player_5_team' => NULL,
            'player_5_race' => NULL,
            'player_5_apm' => NULL,
            'player_5_eapm' => NULL,
            'player_6' => NULL,
            'player_6_team' => NULL,
            'player_6_race' => NULL,
            'player_6_apm' => NULL,
            'player_6_eapm' => NULL,
            'player_7' => NULL,
            'player_7_team' => NULL,
            'player_7_race' => NULL,
            'player_7_apm' => NULL,
            'player_7_eapm' => NULL,
            'player_8' => NULL,
            'player_8_team' => NULL,
            'player_8_race' => NULL,
            'player_8_apm' => NULL,
            'player_8_eapm' => NULL,
            'user_id' => '1',
            'edited_by' => NULL,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ),
          
            array('title' => 'WhiteRa vs EX',
                'file' => '../storage/app/public/replays/whitera.rep',
                'players_count' => '2',
                'downloads_counter' => '12',
                'player_1' => 'xlo.ex',
                'player_1_team' => '1',
                'player_1_race' => 'Terran',
                'player_1_apm' => '290',
                'player_1_eapm' => '229',
                'player_2' => 'White-Ra',
                'player_2_team' => '2',
                'player_2_race' => 'Protoss',
                'player_2_apm' => '193',
                'player_2_eapm' => '168',
                'player_3' => NULL,
                'player_3_team' => NULL,
                'player_3_race' => NULL,
                'player_3_apm' => NULL,
                'player_3_eapm' => NULL,
                'player_4' => NULL,
                'player_4_team' => NULL,
                'player_4_race' => NULL,
                'player_4_apm' => NULL,
                'player_4_eapm' => NULL,
                'player_5' => NULL,
                'player_5_team' => NULL,
                'player_5_race' => NULL,
                'player_5_apm' => NULL,
                'player_5_eapm' => NULL,
                'player_6' => NULL,
                'player_6_team' => NULL,
                'player_6_race' => NULL,
                'player_6_apm' => NULL,
                'player_6_eapm' => NULL,
                'player_7' => NULL,
                'player_7_team' => NULL,
                'player_7_race' => NULL,
                'player_7_apm' => NULL,
                'player_7_eapm' => NULL,
                'player_8' => NULL,
                'player_8_team' => NULL,
                'player_8_race' => NULL,
                'player_8_apm' => NULL,
                'player_8_eapm' => NULL,
                'user_id' => '1',
                'edited_by' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
          
            array('title' => 'Bisu vs Flash',
                'file' => '../storage/app/public/replays/bisu.rep',
                'players_count' => '2',
                'downloads_counter' => '22',
                'player_1' => 'Bisu',
                'player_1_team' => '1',
                'player_1_race' => 'Protoss',
                'player_1_apm' => '358',
                'player_1_eapm' => '281',
                'player_2' => 'FlaSh',
                'player_2_team' => '2',
                'player_2_race' => 'Terran',
                'player_2_apm' => '396',
                'player_2_eapm' => '262',
                'player_3' => NULL,
                'player_3_team' => NULL,
                'player_3_race' => NULL,
                'player_3_apm' => NULL,
                'player_3_eapm' => NULL,
                'player_4' => NULL,
                'player_4_team' => NULL,
                'player_4_race' => NULL,
                'player_4_apm' => NULL,
                'player_4_eapm' => NULL,
                'player_5' => NULL,
                'player_5_team' => NULL,
                'player_5_race' => NULL,
                'player_5_apm' => NULL,
                'player_5_eapm' => NULL,
                'player_6' => NULL,
                'player_6_team' => NULL,
                'player_6_race' => NULL,
                'player_6_apm' => NULL,
                'player_6_eapm' => NULL,
                'player_7' => NULL,
                'player_7_team' => NULL,
                'player_7_race' => NULL,
                'player_7_apm' => NULL,
                'player_7_eapm' => NULL,
                'player_8' => NULL,
                'player_8_team' => NULL,
                'player_8_race' => NULL,
                'player_8_apm' => NULL,
                'player_8_eapm' => NULL,
                'user_id' => '1',
                'edited_by' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
          
            array('title' => 'Androide vs Advocate',
                'file' => '../storage/app/public/replays/androide.rep',
                'players_count' => '2',
                'downloads_counter' => '11',
                'player_1' => 'MYM.Advokate',
                'player_1_team' => '1',
                'player_1_race' => 'Terran',
                'player_1_apm' => '272',
                'player_1_eapm' => '182',
                'player_2' => 'Androide',
                'player_2_team' => '2',
                'player_2_race' => 'Terran',
                'player_2_apm' => '368',
                'player_2_eapm' => '162',
                'player_3' => NULL,
                'player_3_team' => NULL,
                'player_3_race' => NULL,
                'player_3_apm' => NULL,
                'player_3_eapm' => NULL,
                'player_4' => NULL,
                'player_4_team' => NULL,
                'player_4_race' => NULL,
                'player_4_apm' => NULL,
                'player_4_eapm' => NULL,
                'player_5' => NULL,
                'player_5_team' => NULL,
                'player_5_race' => NULL,
                'player_5_apm' => NULL,
                'player_5_eapm' => NULL,
                'player_6' => NULL,
                'player_6_team' => NULL,
                'player_6_race' => NULL,
                'player_6_apm' => NULL,
                'player_6_eapm' => NULL,
                'player_7' => NULL,
                'player_7_team' => NULL,
                'player_7_race' => NULL,
                'player_7_apm' => NULL,
                'player_7_eapm' => NULL,
                'player_8' => NULL,
                'player_8_team' => NULL,
                'player_8_race' => NULL,
                'player_8_apm' => NULL,
                'player_8_eapm' => NULL,
                'user_id' => '1',
                'edited_by' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
          
            array(
                'title' => 'Terror vs gosudark',
                'file' => '../storage/app/public/replays/terror.rep',
                'players_count' => '2',
                'downloads_counter' => '7',
                'player_1' => 'SouL)P(Gosudark',
                'player_1_team' => '1',
                'player_1_race' => 'Protoss',
                'player_1_apm' => '287',
                'player_1_eapm' => '221',
                'player_2' => 'TerrOru',
                'player_2_team' => '2',
                'player_2_race' => 'Terran',
                'player_2_apm' => '287',
                'player_2_eapm' => '212',
                'player_3' => NULL,
                'player_3_team' => NULL,
                'player_3_race' => NULL,
                'player_3_apm' => NULL,
                'player_3_eapm' => NULL,
                'player_4' => NULL,
                'player_4_team' => NULL,
                'player_4_race' => NULL,
                'player_4_apm' => NULL,
                'player_4_eapm' => NULL,
                'player_5' => NULL,
                'player_5_team' => NULL,
                'player_5_race' => NULL,
                'player_5_apm' => NULL,
                'player_5_eapm' => NULL,
                'player_6' => NULL,
                'player_6_team' => NULL,
                'player_6_race' => NULL,
                'player_6_apm' => NULL,
                'player_6_eapm' => NULL,
                'player_7' => NULL,
                'player_7_team' => NULL,
                'player_7_race' => NULL,
                'player_7_apm' => NULL,
                'player_7_eapm' => NULL,
                'player_8' => NULL,
                'player_8_team' => NULL,
                'player_8_race' => NULL,
                'player_8_apm' => NULL,
                'player_8_eapm' => NULL,
                'user_id' => '1',
                'edited_by' => NULL,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ),
          );


        DB::table('replays')->insert($replays);
    }
}