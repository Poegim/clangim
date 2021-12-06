<?php

namespace App\Policies;

use App\Models\Replays\Replay;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplayPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function create(User $user)
    {
        return $user->isInactive();
    }

    public function update(User $user, Replay $replay)
    {
        if ($replay->user->isCaptain())
        {
            return $user->isCaptain() && $replay->user->id == $user->id || $user->isAdmin();
        } elseif(!$replay->user->isCaptain())
        {
            return $user->isViceCaptain() || $replay->user->id == $user->id;

        } else
        {
            return false;
        }
    }

    public function delete(User $user, Replay $replay)
    {
        if ($replay->user->isCaptain())
        {
            return $user->isCaptain() && $replay->user->id == $user->id || $user->isAdmin();
        } elseif(!$replay->user->isCaptain())
        {
            return $user->isViceCaptain();

        } else
        {
            return false;
        }
    }

}
