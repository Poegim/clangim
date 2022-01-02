<?php

namespace App\Http\Controllers\Team;

use App\Models\User;
use Illuminate\View\View;
use App\Models\ClanWars\Game;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index(): View
    {

        $teamList = null;

        return view('team.index',[
            'teamList' => $teamList,
        ]);
    }
}
