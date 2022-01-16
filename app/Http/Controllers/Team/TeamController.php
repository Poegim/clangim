<?php

namespace App\Http\Controllers\Team;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index(): View
    {
        $formerPlayers = User::where('role', 6)->get();
        $players = User::where('role', '<=', 5)->where('role', '>', 1)->get();
        $teamList = $players->sortBy([
            ['role', 'desc'],
        ]);

        return view('team.index', compact('players', 'formerPlayers', 'teamList'));

    }
}
