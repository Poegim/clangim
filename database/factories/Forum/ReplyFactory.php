<?php

namespace Database\Factories\Forum;

use Carbon\Carbon;
use App\Models\Forum\Reply;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReplyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reply::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'              => $this->faker->realText(rand(100,1000)),
            'thread_id'         => rand(1,15),
            'user_id'           => rand(1,5),
            'created_at'        => Carbon::now(),
        ];
    }
}
