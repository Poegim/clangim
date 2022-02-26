<?php

namespace Database\Seeders;

use App\Models\Forum\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
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
            Reply::factory()->count(50)->create();

        } elseif(config('app.seed.type') == "deploy")
        {
            //
        } elseif(config('app.seed.type') == "tests")
        {
            Reply::factory()->count(500)->create();
        }

    }
}
