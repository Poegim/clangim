<?php

namespace App\Http\Controllers;

use App\Models\Posts\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $posts = Post::withCount('postComments')->orderByDesc('created_at')->get();
        
        return view('dashboard', compact('posts'));
        
    }
}
