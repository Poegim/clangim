<?php

namespace Database\Seeders;

use App\Models\Posts\PostComment;
use Illuminate\Database\Seeder;

class PostCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostComment::factory()->count(10)->create();
    }
}
