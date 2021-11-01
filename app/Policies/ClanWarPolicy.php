<?php

namespace App\Policies;

use App\Models\ClanWar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClanWarPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, ClanWar $clanWar)
    {
        //
    }

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

    public function restore(User $user, ClanWar $clanWar)
    {
        //
    }

    public function forceDelete(User $user, ClanWar $clanWar)
    {
        //
    }

}
