<?php

namespace App\Policies;

use App\Models\ClanWars\ClanWar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClanWarPolicy
{
    use HandlesAuthorization;

    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';

    public function create(User $user): bool
    {
        return $user->isViceCaptain();
    }

    public function update(User $user): bool
    {
        return $user->isViceCaptain();
    }

    public function delete(User $user): bool
    {
        return $user->isCaptain();
    }

}
