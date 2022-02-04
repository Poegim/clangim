<?php

namespace App\Http\Controllers\ClanWars;

use App\Models\ClanWars\ClanWar;
use App\Http\Traits\ClanWarResult;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ClanWarController extends Controller
{

    use ClanWarResult;

    public function index(): View
    {
        return view('clan-wars.index');
    }

    public function show(ClanWar $clanWar): View
    {
        $results = $this->clanWarResult($clanWar);
        $score = $results->wins . ' : ' .$results->losses;

        return view('clan-wars.show', compact('clanWar', 'results', 'score'));
    }

}
