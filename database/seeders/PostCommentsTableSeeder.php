<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Posts\PostComment;
use Illuminate\Support\Facades\DB;

class PostCommentsTableSeeder extends Seeder
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


        } elseif(config('app.seed.type') == "deploy")
        {
            //
        } elseif(config('app.seed.type') == "tests")
        {
            PostComment::factory()->count(500)->create();
        }
    }
}
