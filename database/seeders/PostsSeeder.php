<?php

namespace Database\Seeders;

use App\Domain\Blog\Models\Post;
use App\Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory()->count(5)->create();

        Post::factory()->count(100)->create([
            'author_id' => fn() => $users->random(),
        ]);
    }
}
