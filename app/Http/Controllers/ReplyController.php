<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function store(Request $request)
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
        //
    }

    public function edit(Reply $reply)
    {
        $this->authorize('update', $reply);
        return view('replies.edit', compact('reply'));
    }

    public function update(Request $request, Reply $reply)
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
