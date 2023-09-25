<?php

namespace App\Domain\Blog\Factories;

use App\Domain\Blog\Models\Post;
use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->words(5, true),
            'slug' => $this->faker->unique()->slug(),
            'content' => $this->faker->paragraphs(3, true),
            'published_at' => $this->faker->boolean(75) ? $this->faker->dateTime : null,

            'author_id' => User::factory(),
        ];
    }
}
