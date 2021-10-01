<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ThreadPolicy
{
    use HandlesAuthorization;

    const DELETE = 'delete';

    public function view(User $user, Thread $thread): bool
    {
        return $user->isViceCaptain() || (($user->isPlayer()) && (!$thread->category->hidden));
    }

    public function create(User $user): bool
    {
        return $user->isPlayer();
    }

    public function update(User $user, Thread $thread): bool
    {   
        if(($thread->category->hidden) && (!$user->isCaptain()))
        {
            return ($user->isViceCaptain() && $thread->user_id == $user->id);
        } 
        elseif(($thread->category->hidden) && ($user->isCaptain()))
        {
            return true;
        } 
        elseif(!$thread->category->hidden)
        {
            return $user->isViceCaptain() || $thread->user_id == $user->id;
        }

    }

    public function delete(User $user, Thread $thread): bool
    {
        return $thread->category->hidden ? $user->isCaptain() : $user->isViceCaptain();
    }
}
