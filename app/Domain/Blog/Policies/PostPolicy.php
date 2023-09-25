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

    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->is($post->author);
    }

    public function delete(User $user, Post $post): bool
    {
        return $this->update($user, $post);
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

    public function updateTags(User $user, Post $post): bool
    {
        return $this->update($user, $post);
    }

    public function attachTags(User $user, Post $post): bool
    {
        return $this->update($user, $post);
    }

    public function detachTags(User $user, Post $post): bool
    {
        return $this->update($user, $post);
    }
}
