<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Welcome to Clangim, Starcraft Remastered Clan Management System',
            'slug' => Str::slug('Welcome to Clangim, Starcraft Remastered Clan Management System'),
            'body' => '<div>Here</div>',
            'image' => 'images/posts/1.jpg',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            
        ]);
    }
}
