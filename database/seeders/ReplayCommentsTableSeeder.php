<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Replays\ReplayComment;

class ReplayCommentsTableSeeder extends Seeder
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
            ReplayComment::factory()->count(30)->create();

        } elseif(config('app.seed.type') == "deploy")
        {
            //
        } elseif(config('app.seed.type') == "tests")
        {
            ReplayComment::factory()->count(300)->create();
        }

    }
}
