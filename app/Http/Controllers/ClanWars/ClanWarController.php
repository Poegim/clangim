<?php

namespace App\Http\Controllers\ClanWars;

use Illuminate\Http\Request;
use App\Models\ClanWars\Game;
use App\Models\ClanWars\ClanWar;
use App\Http\Controllers\Controller;
use App\Http\Traits\ClanWarResult;

class ClanWarController extends Controller
{

    use ClanWarResult;

    public function index()
    {
        return view('clan-wars.index');
    }

    public function show(ClanWar $clanWar)
    {
        $results = $this->clanWarResult($clanWar);
        
        $score = $results->wins . ' : ' .$results->losses; 

        return view('clan-wars.show', compact('clanWar', 'results', 'score'));
    }

}
