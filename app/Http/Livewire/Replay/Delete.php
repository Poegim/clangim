<?php

namespace App\Http\Livewire\Replay;

use Livewire\Component;
use App\Models\Replays\Replay;

class Delete extends Component
{
    public $modalVisibility = false;
    public $replay;

    public function loadModal(Replay $replay)
    {
        $this->replay = $replay;
        $this->modalVisibility = true;
    }

    public function deleteReplay()
    {
        $this->replay->delete();
        $this->modalVisibility = false;
        return redirect()->route('replays.index')->with('success', 'Replay delete.');
    }

    public function render()
    {
        return view('livewire.replay.delete');
    }
}
