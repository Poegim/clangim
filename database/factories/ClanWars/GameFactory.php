<?php

namespace Database\Factories\ClanWars;

use App\Models\ClanWars\Game;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Game::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'clan_war_id'       => 1,
            'type'              => rand(1, 4),
            'result'            => rand(0,1),
            'home_player_1'     => rand(1,6),
            'home_player_2'     => rand(1,6),
            'home_player_3'     => rand(1,6),
            'home_player_4'     => rand(1,6),
            'enemy_player_1'    => $this->faker->userName(),
            'enemy_player_2'    => $this->faker->userName(),
            'enemy_player_3'    => $this->faker->userName(),
            'enemy_player_4'    => $this->faker->userName(),
            'created_at'        => Carbon::now(),
            'updated_at'        => Carbon::now(),
        ];
    }
}
