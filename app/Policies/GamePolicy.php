<?php

namespace App\Policies;

use App\Models\Game;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GamePolicy
{
    use HandlesAuthorization;

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
