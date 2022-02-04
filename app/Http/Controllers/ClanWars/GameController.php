<?php

namespace App\Http\Controllers\ClanWars;

use App\Models\ClanWars\ClanWar;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class GameController extends Controller
{
    public function edit(ClanWar $clanWar): View
    {
        $this->authorize(ClanWar::class, 'update');

        return view('games.edit', [
            'clanWar' => $clanWar,
        ]);
    }

}
