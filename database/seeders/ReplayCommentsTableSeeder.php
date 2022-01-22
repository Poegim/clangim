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
        ReplayComment::factory()->count(rand(10,30))->create();
    }
}
