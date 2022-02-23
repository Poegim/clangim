<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Posts\Post;
use App\Models\Replays\Replay;
use App\Models\ClanWars\ClanWar;

class HomeController extends Controller
{
    public $replays;

    public function index(): View
    {
        $posts =
            Post::withCount('postComments')
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->simplePaginate(10);

        $clanWars =
            ClanWar::where('date', '>', now())
                ->with('user')
                ->orderBy('date', 'asc')
                ->limit(5)
                ->get();

        $this->replays =
            Replay::orderBy('id', 'desc')
                ->with('comments')
                ->limit(5)
                ->get();

        $settings = (object) config('settings');
        $teamFlag = $settings->flag;

        $topUsers = User::orderBy('points', 'desc')->limit(5)->get();
        $topPlayers = User::where('role', '<=', 5)->where('role', '>', 1)->limit(5)->get();

        return view('dashboard', [
            'posts'         => $posts,
            'clanWars'      => $clanWars,
            'replays'       => $this->replays,
            'topUsers'      => $topUsers,
            'teamFlag'      => $teamFlag,
            'topPlayers'    => $topPlayers,
        ]);

    }

}
