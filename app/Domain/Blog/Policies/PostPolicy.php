<?php

namespace App\Domain\Blog\Policies;

use App\Domain\Blog\Models\Post;
use App\Domain\Users\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function view(?User $user, Post $post): bool
    {
        if ($post->published_at) {
            return true;
        }

        return $user && $user->is($post->author);
    }

    public function viewAuthor(?User $user, Post $post): bool
    {
        return $this->view($user, $post);
    }

    public function viewComments(?User $user, Post $post): bool
    {
        return $this->view($user, $post);
    }

    public function viewTags(?User $user, Post $post): bool
    {
        return $this->view($user, $post);
    }
}
