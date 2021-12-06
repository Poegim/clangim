<?php

namespace App\Http\Livewire\ReplayComment;

use Livewire\Component;
use App\Models\Replays\ReplayComment;
use App\Policies\ReplayCommentPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{
    use AuthorizesRequests;

    public $replayComment;
    public $modalVisibility = false;

    public function loadModal(ReplayComment $replayComment)
    {
        $this->authorize(ReplayCommentPolicy::DELETE, $this->replayComment);

        $this->replayComment = $replayComment;
        $this->modalVisibility = true;
    }

    public function deleteReplayComment()
    {
        $this->authorize(ReplayCommentPolicy::DELETE, $this->replayComment);

        $replay = $this->replayComment->replay;
        $this->replayComment->delete();
        $this->modalVisibility = false;
        return redirect()->route('replays.show', $replay)->with('success', 'Comment deleted.');
    }

    public function render()
    {
        return view('livewire.replay-comment.delete');
    }
}
