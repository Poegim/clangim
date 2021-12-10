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

        $teamList = User::where('role', '<=', 5)->where('id', '!=', 1)->get();

        foreach ($teamList as $player)
        {
            $player->wins = Game::where('result', '=', 1)
                                ->where('home_player_1', '=', $player->id)
                                ->orWhere('home_player_2', '=', $player->id)
                                ->orWhere('home_player_3', '=', $player->id)
                                ->orWhere('home_player_4', '=', $player->id)
                                ->get();

            $player->losses = Game::where('result', '=', 0)
                                ->where('home_player_1', '=', $player->id)
                                ->orWhere('home_player_2', '=', $player->id)
                                ->orWhere('home_player_3', '=', $player->id)
                                ->orWhere('home_player_4', '=', $player->id)
                                ->get();
        }

        return view('team.index',[
            'teamList' => $teamList,
        ]);
    }
}
