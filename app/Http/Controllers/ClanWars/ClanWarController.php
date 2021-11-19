<?php

namespace App\Http\Controllers\ClanWars;

use App\Http\Controllers\Controller;
use App\Models\ClanWars\ClanWar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClanWarController extends Controller
{
    public function index()
    {

        return view('clan-wars.index', [
            'clanWars' => ClanWar::all(),
        ]);
    }

    public function create()
    {
        return view('clan-wars.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', ClanWar::class);

        $this->validate($request, [
            'title' => [
                'required', 
                'string',
                Rule::unique('clan_wars'),
            ],
            'date' => ['required'],
        ]);

        $clanWar = new ClanWar;
        $clanWar->title = $request->title;
        $clanWar->user_id = auth()->user()->id;
        $clanWar->date = $request->date;
        $clanWar->save();

        return redirect()->route('games.edit', $clanWar->id);

    }

    public function show(ClanWar $clanWar)
    {
        //
    }

    public function edit(ClanWar $clanWar)
    {
        //
    }

    public function update(Request $request, ClanWar $clanWar)
    {
        //
    }

    public function destroy(ClanWar $clanWar)
    {
        //
    }
}
