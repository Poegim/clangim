<?php

namespace App\Http\Controllers\Forum;

use File;
use App\Models\Forum\Thread;
use App\Models\Forum\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ThreadController extends Controller
{

    public function create(Request $request): View
    {
        $this->authorize('create', Thread::class);

        $thisCategory = Category::where('slug', '=', $request->segment(2))->firstOrfail();

        auth()->user()->isCaptain() ?
            $categories = Category::all() : $categories = Category::where('hidden', false)->get();

        return view('threads.create', [
            'thisCategory' => $thisCategory,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {

        $this->authorize('create', Thread::class);

        $imgPath = NULL;

        $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:35',
                Rule::unique('threads'),
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

        ], [
            'body.min' => 'Body field requires at least 2 characters.'
        ]);

        if ($request->image != NULL)
        {
            $threadImage = $request->file('image');

            $nameGen = hexdec(uniqid());
            $imgExtension = strtolower($threadImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExtension;
            $uploadLocation = 'images/threads/';
            $threadImage->move($uploadLocation,$imgName);
            $imgPath = 'images/threads/'.$imgName;

        }

        $thread = new Thread;
        $thread->title = $request->title;
        $thread->slug = Str::slug($request->title);
        $thread->body = $request->body;
        $thread->image = $imgPath;
        $thread->category_id = $request->category;
        $thread->user_id = auth()->user()->id;
        $thread->save();

        return redirect()->route('categories.show', $thread->category->slug)->with('success', 'Thread added successfully.');

    }

    public function show(Thread $thread): View
    {

        $this->authorize('view', $thread);

        $replies = $thread->replies;

        return view('threads.show', [
            'thread' => $thread,
            'replies' => $replies,
        ]);
    }


    public function edit(Thread $thread): View
    {

        $this->authorize('update', $thread);
        auth()->user()->isCaptain() ? $categories = Category::all() : $categories = Category::where('hidden', '!=', true)->get();

        return view('threads.edit', [
            'thread' => $thread,
            'categories' => $categories,
        ]);

    }


    public function update(Request $request, Thread $thread): RedirectResponse
    {
        $this->authorize('update', $thread);

        $request->validate([
            'title' => [
                'required',
                'string',
                'min:3',
                'max:35',
                Rule::unique('threads')->ignore($thread->id, 'id'),
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

        ], [
            'body.min' => 'Body field requires at least 2 characters.'
        ]);

        if ($request->remove_image == "on")
        {
            $request->image = NULL;
            File::delete($thread->image);
            $thread->image = NULL;

        }


        if ($request->image != NULL)
        {
            if ($thread->image != NULL)
            {
                File::delete($thread->image);
            }

            $threadImage = $request->file('image');

            $nameGen = hexdec(uniqid());
            $imgExtension = strtolower($threadImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExtension;
            $uploadLocation = 'images/threads/';
            $threadImage->move($uploadLocation,$imgName);
            $imgPath = 'images/threads/'.$imgName;
            $thread->image = $imgPath;

        }

        $thread->title = $request->title;
        $thread->slug = Str::slug($request->title);
        $thread->body = $request->body;
        $thread->category_id = $request->category;
        $thread->edited_by = auth()->user()->id;
        $thread->save();

        return redirect()->route('threads.show', $thread->slug)->with('success', 'Thread has been updated.');

    }

}
