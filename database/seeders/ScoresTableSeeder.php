<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $replays = [];

        if(config('app.seed.type') == "demo")
        {
            for ($i=1; $i <= 5; $i++) {

                for ($j=1; $j <= 5; $j++) {

                    $replays[$i][$j] = [
                        'replay_id' => $i,
                        'user_id' => $j,
                        'score' => rand(1,10),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }

            }

            $i = 0;

            foreach($replays as $replay)
            {
                foreach ($replay as $score)
                {
                    $replays[$i] = $score;
                    $i++;
                }
            }

            DB::table('scores')->insert($replays);

        } elseif(config('app.seed.type') == "deploy")
        {
            //
        } elseif(config('app.seed.type') == "tests")
        {
            for ($i=1; $i <= 5; $i++) {

                for ($j=1; $j <= 5; $j++) {

                    $replays[$i][$j] = [
                        'replay_id' => $i,
                        'user_id' => $j,
                        'score' => rand(1,10),
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }

            }

            $i = 0;

            foreach($replays as $replay)
            {
                foreach ($replay as $score)
                {
                    $replays[$i] = $score;
                    $i++;
                }
            }

            DB::table('scores')->insert($replays);
        }


    }
}
