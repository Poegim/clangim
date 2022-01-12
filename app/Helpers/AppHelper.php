<?php

namespace App\Helpers;

class AppHelper
{
    public static function isLoggedAndTeamMember(): bool
    {
        if (auth()->check())
        {
            return auth()->user()->isInactive();

        } else
        {
           return false;
        }
    }
}