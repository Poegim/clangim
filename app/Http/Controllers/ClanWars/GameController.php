<?php

namespace App\Http\Controllers\ClanWars;

use Illuminate\Http\Request;
use App\Models\ClanWars\ClanWar;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function edit(ClanWar $clanWar)
    {
        $this->authorize(ClanWar::class, 'update');

        return view('games.edit', [
            'clanWar' => $clanWar,
        ]);
    }

}
