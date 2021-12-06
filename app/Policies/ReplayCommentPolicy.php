<?php

namespace App\Policies;

use App\Models\Replays\ReplayComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplayCommentPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function create(User $user)
    {
        return $user->isInactive();
    }

    public function update(User $user, ReplayComment $replayComment)
    {
        if ($replayComment->user->isCaptain())
        {
            return $user->isCaptain() && $replayComment->user->id == $user->id || $user->isAdmin();
        } elseif(!$replayComment->user->isCaptain())
        {
            return $user->isViceCaptain() || $replayComment->user->id == $user->id;

        } else
        {
            return false;
        }
    }


    public function delete(User $user, ReplayComment $replayComment)
    {
        if ($replayComment->user->isCaptain())
        {
            return $user->isCaptain() && $replayComment->user->id == $user->id || $user->isAdmin();
        } elseif(!$replayComment->user->isCaptain())
        {
            return $user->isViceCaptain();

        } else
        {
            return false;
        }    
    }
}
