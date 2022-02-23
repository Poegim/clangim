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
        Thread::factory()->count(25)->create();
    }
}
