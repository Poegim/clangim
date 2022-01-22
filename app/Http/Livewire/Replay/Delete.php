<?php

namespace App\Http\Livewire\Replay;

use Livewire\Component;
use App\Models\Replays\Replay;
use App\Policies\ReplayPolicy;
use Illuminate\Support\Facades\File;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{
    use AuthorizesRequests;

    public $modalVisibility = false;
    public $replay;

    public function loadModal(Replay $replay)
    {
        $this->authorize(ReplayPolicy::DELETE, $this->replay);

        $this->replay = $replay;
        $this->modalVisibility = true;
    }

    public function deleteReplay()
    {
        $this->authorize(ReplayPolicy::DELETE, $this->replay);
        File::delete($this->replay->file);
        $this->replay->delete();
        $this->modalVisibility = false;
        return redirect()->route('replays.index')->with('success', 'Replay delete.');
    }

    public function render()
    {
        return view('livewire.replay.delete');
    }
}
