<?php

namespace Database\Factories\Posts;

use App\Models\Posts\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'             => $this->faker->realText(25),
            'slug'              => Str::slug($this->faker->realText(25)),
            'body'              => $this->faker->realText(rand(100,1000)),
            'image'             => 'images/posts/1.jpg',
            'user_id'           => rand(1,5),
            'created_at'        => Carbon::now(),
        ];
    }
}
