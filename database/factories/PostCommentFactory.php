<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\PostComment;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PostComment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'body'              => $this->faker->text(rand(100,1000)),
            'post_id'           => 1,
            'user_id'           => rand(1,5),
            'created_at'        => Carbon::now(),
        ];
    }
}
