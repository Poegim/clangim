<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ThreadController extends Controller
{

    public function create(Request $request): view
    {
        $this->authorize('create', Thread::class);

        $thisCategory = Category::where('slug', '=', $request->segment(2))->firstOrfail();

        auth()->user()->isCaptain() ? $categories = Category::all() : $categories = Category::where('hidden', '!=', true)->get();

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
                'min:2',
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
        $thread->img_path = $imgPath;
        $thread->category_id = $request->category;
        $thread->user_id = auth()->user()->id;
        $thread->save();

        return redirect()->route('threads.show', $thread->slug)->with('success', 'Thread has been added.');

    }


    public function show(Thread $thread): View
    {

        $this->authorize('view', $thread);

        if ($thread->category->deleted_at != NULL)
        {
            abort(403, 'This page has been deleted.');
        }

        $replies = $thread->replies()->paginate(50);

        return view('threads.show', [
            'thread' => $thread,
            'replies' => $replies,
        ]);
    }


    public function edit(Thread $thread)
    {

        $this->authorize('update', $thread);
        auth()->user()->isCaptain() ? $categories = Category::all() : $categories = Category::where('hidden', '!=', true)->get();

        return view('threads.edit', [
            'thread' => $thread,
            'categories' => $categories,
        ]);

    }


    public function update(Request $request, Thread $thread)
    {
        $this->authorize('update', $thread);

        $imgPath = NULL;

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
                'min:2',
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

            //Remove old image, need to be implemented here.
            if (!unlink($thread->img_path))
            {
                abort(403, 'Cant remove original image');
            }

            $threadImage = $request->file('image');

            $nameGen = hexdec(uniqid());
            $imgExtension = strtolower($threadImage->getClientOriginalExtension());
            $imgName = $nameGen . '.' . $imgExtension;
            $uploadLocation = 'images/threads/';
            $threadImage->move($uploadLocation,$imgName);
            $imgPath = 'images/threads/'.$imgName;
            $thread->img_path = $imgPath;

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
