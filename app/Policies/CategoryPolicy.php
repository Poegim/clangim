<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Category;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function viewAny(User $user): bool
    {
        return $user->isPlayer();
    }

    public function view(User $user, Category $category): bool
    {
        return $category->hidden ? $user->isViceCaptain() : $user->isPlayer();
    }

    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    public function update(User $user): bool
    {
        return $user->isCaptain();
    }

    public function delete(User $user): bool
    {
        return $user->isAdmin();
    }


}
