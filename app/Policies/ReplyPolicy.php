<?php

namespace App\Policies;

use App\Models\Reply;
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
        return $user->isViceCaptain() || $reply->user_id == $user->id;
    }

    public function delete(User $user, Reply $reply): bool
    {
        return $user->isViceCaptain();
    }

}
