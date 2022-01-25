<?php

namespace App\Policies;

use App\Models\Forum\Reply;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReplyPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function viewAny(User $user): bool
    {
        return $user->isInactive();
    }

    public function view(User $user, Reply $reply): bool
    {
        return $user->isInactive();
    }

    public function create(User $user): bool
    {
        return $user->isInactive();
    }

    public function update(User $user, Reply $reply): bool
    {
        if ($reply->user->isCaptain())
        {
            return $user->isCaptain() && $reply->user->id == $user->id || $user->isAdmin();
        } elseif(!$reply->user->isCaptain())
        {
            return $user->isViceCaptain() || $reply->user->id == $user->id;

        } else
        {
            return false;
        }
    }

    public function delete(User $user, Reply $reply): bool
    {
        if ($reply->user->isCaptain())
        {
            return $user->isCaptain() && $reply->user->id == $user->id || $user->isAdmin();
        } elseif(!$reply->user->isCaptain())
        {
            return $user->isViceCaptain();
            
        } else
        {
            return false;
        }
    }

}
