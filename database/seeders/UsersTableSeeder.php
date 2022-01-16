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
            'name' => 'Captain',
            'email' => 'captain@example.com',
            'role' => User::CAPTAIN,
            'race' => 'protoss',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Vice',
            'email' => 'vice@example.com',
            'role' => User::VICE_CAPTAIN,
            'race' => 'terran',
            'country' => 'PE',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Player',
            'email' => 'player@example.com',
            'role' => User::PLAYER,
            'race' => 'zerg',
            'country' => 'DE',
            'password' => bcrypt('password'),
        ]);


        User::factory()->create([
            'name' => 'Inactive',
            'email' => 'inactive@example.com',
            'role' => User::INACTIVE,
            'race' => 'random',
            'country' => 'PL',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Ex',
            'email' => 'ex@example.com',
            'role' => User::EX_MEMBER,
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'role' => User::USER,
            'password' => bcrypt('password'),
        ]);

        // User::factory(10)->create();

    }
}
