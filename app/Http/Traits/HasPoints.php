<?php

namespace App\Http\Traits;

trait HasPoints
{
    public function incrementUserPoints()
    {
        auth()->user()->increment('points');
    }
}