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
            'one_vs_one' => 'integer|min:0',
            'two_vs_two' => 'integer|min:0',
            'three_vs_three' => 'integer|min:0',
            'four_vs_four' => 'integer|min:0',
            'date' => ['required'],
        ]);

        $clanWar = new ClanWar;
        $clanWar->title = $request->title;
        $clanWar->user_id = auth()->user()->id;
        
        $request->one_vs_one ? $clanWar->one_vs_one = $request->one_vs_one : null;
        $request->two_vs_two ? $clanWar->two_vs_two = $request->two_vs_two : null;
        $request->three_vs_three ? $clanWar->three_vs_three = $request->three_vs_three : null;
        $request->four_vs_four ? $clanWar->four_vs_four = $request->four_vs_four : null;

        $clanWar->date = $request->date;
        $clanWar->save();

        return redirect()->route('games.store', $clanWar->id);

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
