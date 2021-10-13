<?php

namespace App\Policies;

use App\Models\PostComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCommentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, PostComment $postComment)
    {
        //
    }

    public function create(User $user)
    {
        return $user->isInactive();
    }

    public function update(User $user, PostComment $postComment)
    {
        return $user->isViceCaptain() || $postComment->user->id == $user->id;
    }

    public function delete(User $user, PostComment $postComment)
    {
        return $user->isViceCaptain();
    }

    public function restore(User $user, PostComment $postComment)
    {
        //
    }

    public function forceDelete(User $user, PostComment $postComment)
    {
        //
    }
}
