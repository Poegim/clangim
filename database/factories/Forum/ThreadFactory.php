<?php

namespace Database\Factories\Forum;

use App\Models\Forum\Thread;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThreadFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Thread::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => $this->faker->realText(30),
            'slug'          => $this->faker->unique()->slug,
            'body'          => $this->faker->realText(rand(100,1000)),
            'category_id'   => rand(1,3),
            'user_id'     => rand(1,5),
        ];
    }
}
