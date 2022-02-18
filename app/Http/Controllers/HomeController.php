<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Models\Posts\Post;
use App\Models\Replays\Replay;
use App\Models\ClanWars\ClanWar;
use App\Models\Team\Setting;

class HomeController extends Controller
{
    public $replays;

    public function index(): View
    {
        $posts = Post::withCount('postComments')
                        ->orderBy('created_at', 'desc')
                        ->orderBy('id', 'desc')
                        ->paginate(10);

        $clanWars = ClanWar::where('date', '>', now())->with('user')->orderBy('date', 'asc')->get();
        $settings = (object) config('settings');
        $teamFlag = $settings->flag;

        $this->replays = Replay::orderBy('id', 'desc')->with('comments')->limit(5)->get();
        $this->getAverageReplayScores();

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

    public function getAverageReplayScores(): void
    {
        foreach($this->replays as $replay)
        {
            $scoresCount = $replay->scores->count();
            $sum = $replay->scores->sum('score');
            $sum != 0 ? $replay->averageScore = number_format(round($sum/$scoresCount, 1), 1, '.', '') : $replay->averageScore = 'n/s';
        }

    }
}
