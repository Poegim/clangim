<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\GamesTableSeeder;
use Database\Seeders\PostsTableSeeder;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\RepliesTableSeeder;
use Database\Seeders\ThreadsTableSeeder;
use Database\Seeders\ClanWarsTableSeeder;
use Database\Seeders\CategoriesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ThreadsTableSeeder::class);
        $this->call(RepliesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostCommentsTableSeeder::class);
        $this->call(ClanWarsTableSeeder::class);
        $this->call(GamesTableSeeder::class);

    }
}
