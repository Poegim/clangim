<?php

namespace Database\Factories\Replays;

use App\Models\Replays\ReplayComment;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplayCommentFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReplayComment::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'              => $this->faker->realText(rand(100,1000)),
            'replay_id'         => rand(1,5),
            'user_id'           => rand(1,5),
            'created_at'        => Carbon::now(),
        ];
    }
}
