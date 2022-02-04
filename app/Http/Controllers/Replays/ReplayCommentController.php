<?php

namespace App\Http\Controllers\Replays;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Traits\HasPoints;
use App\Models\Replays\ReplayComment;

class ReplayCommentController extends Controller
{

    use HasPoints;

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

        $this->incrementUserPoints();

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


    public function edit(ReplayComment $replayComment): View
    {
        $this->authorize('update', $replayComment);

        return view('replay-comments.edit', compact('replayComment'));
    }

    public function update(Request $request, ReplayComment $replayComment): RedirectResponse
    {
        $this->authorize('update', $replayComment);

        $this->validate($request, [
            'body' => ['required', 'string', 'min:13'],

            ], [
            'body.min' => 'Body field requires at least 2 characters.',
        ]);

        $replayComment->body = $request->body;
        $replayComment->edited_by = auth()->user()->id;
        $replayComment->save();

        return redirect()->route('replays.show', $replayComment->replay->id)->with('success', 'Comment updated.');
    }
}
