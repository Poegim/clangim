<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'password' => bcrypt('password'),
        ]);

        // User::factory(10)->create();

    }
}
