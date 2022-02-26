<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Posts\Post;
use App\Models\Replays\Replay;
use App\Models\ClanWars\ClanWar;

class HomeController extends Controller
{
    public function index(): View
    {
        $posts =
            Post::withCount('postComments')
                ->orderBy('created_at', 'desc')
                ->orderBy('id', 'desc')
                ->paginate(10);

        $clanWars =
            ClanWar::where('date', '>', now())
                ->with('user')
                ->orderBy('date', 'asc')
                ->limit(5)
                ->get();

        $replays =
            Replay::orderBy('id', 'desc')
                ->withCount('comments')
                ->limit(5)
                ->get();

        $topUsers =
            User::orderBy('points', 'desc')
                ->limit(5)
                ->get();

        $topPlayers =
            User::where('role', '<=', 5)
                ->where('role', '>', 1)
                ->limit(5)
                ->get();

        $settings = (object) config('settings');
        $teamFlag = $settings->flag;

        return view('dashboard', [
            'posts'         => $posts,
            'clanWars'      => $clanWars,
            'replays'       => $replays,
            'topUsers'      => $topUsers,
            'teamFlag'      => $teamFlag,
            'topPlayers'    => $topPlayers,
        ]);

    }

}
