<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, User $model)
    {
        //
    }

    public function create(User $user)
    {
        //
    }

    public function update(User $user, User $model)
    {
        if ($model->isCaptain())
        {
            return $user->isAdmin();

        } elseif($model->isViceCaptain())
        {
            return $user->isCaptain();

        }   elseif(!$model->isCaptain())
        {
            return $user->isViceCaptain();

        } else
        {
            return false;
        }
    }

    public function delete(User $user, User $model)
    {
        if ($model->isCaptain())
        {
            return $user->isAdmin();

        } elseif($model->isViceCaptain())
        {
            return $user->isCaptain();

        }   elseif(!$model->isCaptain())
        {
            return $user->isViceCaptain();

        } else
        {
            return false;
        }
    }

    public function restore(User $user, User $model)
    {
        //
    }

    public function forceDelete(User $user, User $model)
    {
        //
    }
    
}
