<?php

namespace Database\Seeders;

use App\Models\Forum\Thread;
use Illuminate\Database\Seeder;

class ThreadsTableSeeder extends Seeder
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
            Thread::factory()->count(15)->create();

        } elseif(config('app.seed.type') == "deploy")
        {
            //
        } elseif(config('app.seed.type') == "tests")
        {
            Thread::factory()->count(75)->create();
        }

    }
}
