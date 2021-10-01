<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function store(Request $request)
    {
        $this->authorize('create', Thread::class);

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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
