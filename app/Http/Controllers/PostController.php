<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(): View
    {
        return view('dashboard');
    }

    public function create(): View
    {
        $this->authorize('create', Post::class);
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Post::class);

        $imgPath = NULL;

        $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:35',
                Rule::unique('posts'),
            ],

            'body' => [
                'required',
                'min:13',
            ],

            'image' => [
                'image',
                'max:512',
                'dimensions:min_width=50,min_height=50,max_height=1024,max_width=1024',
                'mimes:jpg,png',
            ],

        ]);

        if ($request->image != NULL)
        {
            $postImage = $request->file('image');

            $nameGen = hexdec(uniqid());
            $imgExtension = strtolower($postImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExtension;
            $uploadLocation = 'images/posts/';
            $postImage->move($uploadLocation,$imgName);
            $imgPath = 'images/posts/'.$imgName;

        }

        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->image = $imgPath;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Post added successfully.');

    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        //
    }

    public function update(Request $request, Post $post)
    {
        //
    }


}
