<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
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
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'role' => User::ADMIN,
                'points' => rand(1,35),
                'country' => array_rand(config('countries.country_list'), 1),
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'Poegim',
                'email' => 'poegim@example.com',
                'role' => User::CAPTAIN,
                'battleid' => rand(1000,100000).'#poegim',
                'shieldid' => rand(1000,100000).'#poegim',
                'profile_photo_path' => 'profile-photos/001.jpg',
                'points' => rand(1,35),
                'country' => "EU",
                'race' => 'protoss',
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'KopeT',
                'email' => 'captain@example.com',
                'role' => User::CAPTAIN,
                'battleid' => rand(1000,100000).'#kopet',
                'shieldid' => rand(1000,100000).'#kopet',
                'profile_photo_path' => 'profile-photos/1.jpg',
                'points' => rand(1,35),
                'country' => array_rand(config('countries.country_list'), 1),
                'race' => 'terran',
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'Ponyth',
                'email' => 'vice@example.com',
                'role' => User::VICE_CAPTAIN,
                'battleid' => rand(1000,100000).'#ponyth',
                'shieldid' => rand(1000,100000).'#ponyth',
                'profile_photo_path' => 'profile-photos/3.jpg',
                'points' => rand(1,35),
                'country' => array_rand(config('countries.country_list'), 1),
                'race' => 'protoss',
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'OctopusZerg',
                'email' => 'vice2@example.com',
                'role' => User::VICE_CAPTAIN,
                'battleid' => rand(1000,100000).'#octopusZerg',
                'shieldid' => rand(1000,100000).'#octopusZerg',
                'profile_photo_path' => 'profile-photos/4.jpg',
                'points' => rand(1,35),
                'country' => array_rand(config('countries.country_list'), 1),
                'race' => 'zerg',
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'White-Cob-Ra',
                'email' => 'white@example.com',
                'role' => User::CAPTAIN,
                'battleid' => rand(1000,100000).'#whitecobra',
                'shieldid' => rand(1000,100000).'#whitecobra',
                'profile_photo_path' => 'profile-photos/5.jpg',
                'points' => rand(1,35),
                'country' => 'UA',
                'race' => 'protoss',
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'ChameleonZerg',
                'email' => 'chamel@example.com',
                'role' => User::PLAYER,
                'battleid' => rand(1000,100000).'#chameleonzerg',
                'shieldid' => rand(1000,100000).'#chameleonzerg',
                'profile_photo_path' => 'profile-photos/6.jpg',
                'points' => rand(1,35),
                'country' => array_rand(config('countries.country_list'), 1),
                'race' => 'zerg',
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'COyate',
                'email' => 'oyate@example.com',
                'role' => User::PLAYER,
                'battleid' => rand(1000,100000).'#coyate',
                'shieldid' => rand(1000,100000).'#coyate',
                'profile_photo_path' => 'profile-photos/7.jpg',
                'points' => rand(1,35),
                'country' => 'SE',
                'race' => 'protoss',
                'password' => bcrypt('password'),
            ]);

            User::factory()->create([
                'name' => 'Catenza',
                'email' => 'inactive@example.com',
                'role' => User::INACTIVE,
                'battleid' => rand(1000,100000).'#catenza',
                'shieldid' => rand(1000,100000).'#catenza',
                'profile_photo_path' => 'profile-photos/2.jpg',
                'points' => rand(1,35),
                'country' => 'GB',
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

        } elseif(config('app.seed.type') == "deploy")
        {
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'role' => User::ADMIN,
                'points' => rand(1,35),
                'country' => array_rand(config('countries.country_list'), 1),
                'password' => bcrypt('password'),
            ]);

        } elseif(config('app.seed.type') == "tests")
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
                'email' => 'vice3@example.com',
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

            User::factory(10)->create();
        }




    }
}
