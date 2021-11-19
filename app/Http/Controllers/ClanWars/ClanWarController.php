<?php

namespace App\Http\Controllers\ClanWars;

use Illuminate\Http\Request;
use App\Models\ClanWars\Game;
use App\Models\ClanWars\ClanWar;
use App\Http\Controllers\Controller;

class ClanWarController extends Controller
{
    public function index()
    {
        return view('clan-wars.index');
    }

    public function show(ClanWar $clanWar)
    {
        $wonGames = Game::where('clan_war_id', $clanWar->id)->where('result', '1')->get();
        $loseGames = Game::where('clan_war_id', $clanWar->id)->where('result', '0')->get();
        $score = $wonGames->count() . ' : ' .$loseGames->count(); 

        if($wonGames->count() > $loseGames->count())
        {
            $result = 'WIN';
        } elseif($wonGames->count() < $loseGames->count())
        {
            $result = 'LOSE';
        } elseif($wonGames->count() == $loseGames->count())
        {
            $result = 'DRAW';
        }

        return view('clan-wars.show', compact('clanWar', 'result', 'score'));
    }

}
