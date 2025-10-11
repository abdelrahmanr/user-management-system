<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{

     //protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title'   => fake()->sentence,
            'body'    => fake()->sentence(5),
            'user_id' => User::query()->inRandomOrder()->value('id') ?? User::factory(),
        ];
    }
}
