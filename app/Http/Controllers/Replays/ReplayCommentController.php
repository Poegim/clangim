<?php

namespace App\Http\Controllers\Replays;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Replays\ReplayComment;

class ReplayCommentController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', ReplayComment::class);
       
        $this->validate($request, [
            'body' => ['required', 'string', 'min:13'],
            'replay_id' => ['required'],
            
        ], [
            'body.min' => 'Body field requires at least 2 characters.',
        ]);

        ReplayComment::Create($this->modelData($request));

        return redirect()->route('replays.show', $request->replay_id)->with('success', 'Comment added.');

    }

    public function modelData(Request $request): array
    {
        return [
            'body' => $request->body,
            'replay_id' => $request->replay_id,
            'user_id'   => auth()->user()->id,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ];
    }


    public function show(ReplayComment $replayComment)
    {
        //
    }

    public function edit(ReplayComment $replayComment)
    {
        return 'edit';
    }

    public function update(Request $request, ReplayComment $replayComment)
    {
        //
    }
}
