<?php

namespace App\Http\Controllers;

use App\Models\ClanWars\ClanWar;
use App\Models\Posts\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('postComments')->orderByDesc('created_at')->paginate(10);
        $clanWars = ClanWar::where('date', '>', now())->with('user')->orderBy('date', 'asc')->get();
        

        return view('dashboard', [
            'posts' => $posts,
            'clanWars' => $clanWars,
        ]);
        
    }
}
