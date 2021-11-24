<?php

namespace App\Policies;

use App\Models\Replays\Replay;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplayPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Replay $replay)
    {
        //
    }

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
        return $user->isCaptain();
    }

    public function restore(User $user, Replay $replay)
    {
        //
    }

    public function forceDelete(User $user, Replay $replay)
    {
        //
    }
}
