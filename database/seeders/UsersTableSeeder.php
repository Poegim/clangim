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
            'points' => rand(1,35),
            'country' => array_rand(config('countries.country_list'), 1),
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Captain',
            'email' => 'captain@example.com',
            'role' => User::CAPTAIN,
            'points' => rand(1,35),
            'country' => array_rand(config('countries.country_list'), 1),
            'race' => 'protoss',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Vice',
            'email' => 'vice@example.com',
            'role' => User::VICE_CAPTAIN,
            'points' => rand(1,35),
            'country' => array_rand(config('countries.country_list'), 1),
            'race' => 'terran',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Player',
            'email' => 'player@example.com',
            'role' => User::PLAYER,
            'points' => rand(1,35),
            'country' => array_rand(config('countries.country_list'), 1),
            'race' => 'zerg',
            'password' => bcrypt('password'),
        ]);


        User::factory()->create([
            'name' => 'Inactive',
            'email' => 'inactive@example.com',
            'role' => User::INACTIVE,
            'points' => rand(1,35),
            'country' => array_rand(config('countries.country_list'), 1),
            'race' => 'random',
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'Ex',
            'email' => 'ex@example.com',
            'role' => User::EX_MEMBER,
            'points' => rand(1,35),
            'country' => array_rand(config('countries.country_list'), 1),
            'password' => bcrypt('password'),
        ]);

        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'role' => User::USER,
            'points' => rand(1,35),
            'country' => array_rand(config('countries.country_list'), 1),
            'password' => bcrypt('password'),
        ]);

        // User::factory(10)->create();

    }
}
