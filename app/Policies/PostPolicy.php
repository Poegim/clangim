<?php

namespace App\Policies;

use App\Models\Posts\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function create(User $user): bool
    {
        return $user->isViceCaptain();
    }

    public function update(User $user, Post $post): bool
    {
        if ($post->user->isCaptain())
        {
            return $user->isCaptain() && $post->user->id == $user->id || $user->isAdmin();

        } elseif(!$post->user->isCaptain())
        {
            return $user->isViceCaptain();

        } else
        {
            return false;
        }
    }

    public function delete(User $user, Post $post): bool
    {
        if ($post->user->isCaptain())
        {
            return $user->isCaptain() && $post->user->id == $user->id || $user->isAdmin();

        } elseif(!$post->user->isCaptain())
        {
            return $user->isViceCaptain();

        } else
        {
            return false;
        }
    }

}
