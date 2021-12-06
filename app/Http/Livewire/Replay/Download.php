<?php

namespace App\Http\Livewire\Replay;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Replays\Replay;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Download extends Component
{
    public $replay;
    public $modelId;
    public $downloadsCounter;
    public $disabled = false;

    public function download(): BinaryFileResponse
    {
        $this->disabled = true;
        $this->loadModel();
        $this->replay->increment('downloads_counter');
        $this->downloadsCounter = $this->replay->downloadsCounter();
        return response()->download($this->replay->file);

    }

    public function loadModel(): void
    {
        $this->replay = Replay::findOrFail($this->modelId);
    }

    public function render(): View
    {
        return view('livewire.replay.download');
    }
}
