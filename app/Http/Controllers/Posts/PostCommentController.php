<?php

namespace App\Http\Controllers\Posts;

use Illuminate\View\View;
use App\Models\Posts\PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class PostCommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {

        $this->authorize('create', PostComment::class);

        $request->validate([
            'body' => [
                'required',
                'min:13',
            ],

        ],[
            'body.min' => 'Body field requires at least 2 characters.'
        ]);

        $postComment = new PostComment;
        $postComment->body = $request->body;
        $postComment->post_id = $request->post_id;
        $postComment->user_id = auth()->user()->id;
        $postComment->save();

        return redirect()->route('post.show', $request->post_slug)->with('success', 'Post added successfully.');
    }

    public function show(PostComment $postComment)
    {
        //
    }

    public function edit(PostComment $postComment): View
    {
        $this->authorize('update', $postComment);

        return view('post-comments.edit', compact('postComment'));
    }

    public function update(Request $request, PostComment $postComment)
    {
        $this->authorize('update', $postComment);

        $request->validate([
            'body' => [
                'required',
                'min:13',
            ],

        ],[
            'body.min' => 'Body field requires at least 2 characters.'
        ]);

        $postComment->body = $request->body;
        $postComment->edited_by = auth()->user()->id;
        $postComment->save();

        return redirect()->route('post.show', $request->post_slug)->with('success', 'Post updated successfully.');
    }

}
