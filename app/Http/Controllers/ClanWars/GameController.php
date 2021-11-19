<?php

namespace App\Http\Controllers\ClanWars;


use Illuminate\Http\Request;
use App\Models\ClanWars\Game;
use App\Models\ClanWars\ClanWar;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(ClanWar $clanWar)
    {
        $this->authorize('create', Game::class);

        for($i = 0; $i < $clanWar->one_vs_one; $i++)
        {
            Game::create([
                'clan_war_id'   => $clanWar->id,
                'type'	        => 1,
            ]);
        }

        for($i = 0; $i < $clanWar->two_vs_two; $i++)
        {
            Game::create([
                'clan_war_id'   => $clanWar->id,
                'type'	        => 2,
            ]);
        }

        for($i = 0; $i < $clanWar->three_vs_three; $i++)
        {
            Game::create([
                'clan_war_id'   => $clanWar->id,
                'type'	        => 3,
            ]);
        }

        for($i = 0; $i < $clanWar->four_vs_four; $i++)
        {
            Game::create([
                'clan_war_id'   => $clanWar->id,
                'type'	        => 4,
            ]);
        }

        return redirect()
                ->route('games.edit', $clanWar->id)
                ->with('success', 'Clan War has been created, please enter games details.');
    }

    public function show(Game $game)
    {
        //
    }

    public function edit(ClanWar $clanWar)
    {
        return view('games.edit', [
            'clanWar' => $clanWar,
        ]);
    }

    public function update(Request $request, Game $game)
    {
        $this->validate($request, [
            'home_player1.*' => 'integer',
        ]);
    }

    public function destroy(Game $game)
    {
        //
    }
}
