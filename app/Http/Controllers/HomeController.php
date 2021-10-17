<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): View
    {
        $posts = Post::withCount('postComments')->paginate(10);
        return view('dashboard', compact('posts'));
        
    }
}
