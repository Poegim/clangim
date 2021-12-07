<?php

namespace App\Http\Controllers\Forum;

use App\Models\Forum\Reply;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ReplyController extends Controller
{

    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', Reply::class);

        $request->validate([

            'body' => [
                'required',
                'min:13',
            ],

        ], [
            'body.min' => 'The body field requires at least 2 characters.'
        ]);
        

        $reply = new Reply;
        $reply->body = $request->body;
        $reply->thread_id = $request->thread_id;
        $reply->user_id = auth()->user()->id;
        $reply->save();

        return back()->with('success', 'Reply saved.');
        
    }

    public function show($id)
    {
        //Considerate in future, after beta release.
    }

    public function edit(Reply $reply): View
    {
        $this->authorize('update', $reply);
        return view('replies.edit', compact('reply'));
    }

    public function update(Request $request, Reply $reply): RedirectResponse
    {
        $this->authorize('update', $reply);

        $request->validate([

            'body' => [
                'required',
                'min:13',
            ],

        ], [
            'body.min' => 'The body field requires at least 2 characters.'
        ]);
        
        $reply->body = $request->body;
        $reply->edited_by = auth()->user()->id;
        $reply->save();

        return redirect()->route('threads.show', $reply->thread->slug)->with('success', 'Reply saved.');

    }

}