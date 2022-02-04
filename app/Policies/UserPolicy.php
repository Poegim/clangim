<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

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

}
