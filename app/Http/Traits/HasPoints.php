<?php

namespace App\Http\Traits;

trait HasPoints
{
    public function incrementUserPoints(): void
    {
        auth()->user()->increment('points');
    }
}
