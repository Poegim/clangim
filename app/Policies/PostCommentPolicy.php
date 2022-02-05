<?php

namespace App\Policies;

use App\Models\Posts\PostComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCommentPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function create(User $user): bool
    {
        return $user->isInactive();
    }

    public function update(User $user, PostComment $postComment): bool
    {
        if ($postComment->user->isCaptain())
        {
            return $user->isCaptain() && $postComment->user->id == $user->id || $user->isAdmin();
        } elseif(!$postComment->user->isCaptain())
        {
            return $user->isViceCaptain() || $postComment->user->id == $user->id;

        } else
        {
            return false;
        }

    }

    public function delete(User $user, PostComment $postComment): bool
    {
        if ($postComment->user->isCaptain())
        {
            return $user->isCaptain() && $postComment->user->id == $user->id || $user->isAdmin();
        } elseif(!$postComment->user->isCaptain())
        {
            return $user->isViceCaptain();

        } else
        {
            return false;
        }
    }

}
