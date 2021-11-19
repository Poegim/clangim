<?php

namespace App\Policies;

use App\Models\ClanWars\Game;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamePolicy
{
    use HandlesAuthorization;

    const CREATE = 'create';
    const DELETE = 'delete';
    const UPDATE = 'update';

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Game $game)
    {
        //
    }

    public function create(User $user): bool
    {
        return $user->isViceCaptain();
    }

    public function update(User $user, Game $game): bool
    {
        return $user->isViceCaptain();
    }

    public function delete(User $user, Game $game): bool
    {
        return $user->isViceCaptain();
    }

    public function restore(User $user, Game $game)
    {
        //
    }

    public function forceDelete(User $user, Game $game)
    {
        //
    }
}
