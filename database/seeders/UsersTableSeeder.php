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
            'role' => User::ADMIN,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'John',
            'email' => 'john@example.com',
            'role' => User::CAPTAIN,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Dallas',
            'email' => 'dallas@example.com',
            'role' => User::VICE_CAPTAIN,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Proxima',
            'email' => 'proxima@example.com',
            'role' => User::PLAYER,
            'password' => bcrypt('password'),
        ]);


        User::factory()->create([
            'name' => 'Gamma',
            'email' => 'gamma@example.com',
            'role' => User::INACTIVE,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Alpha',
            'email' => 'alpha@example.com',
            'role' => User::EX_MEMBER,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Omega',
            'email' => 'omega@example.com',
            'role' => User::USER,
            'password' => bcrypt('password'),
        ]);

        // User::factory(10)->create();

    }
}
