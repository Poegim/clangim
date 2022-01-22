<?php

namespace App\Http\Livewire\Replay;

use Livewire\Component;
use App\Models\Replays\Replay;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class HomePageDownload extends Component
{
    public $replay;
    public $modelId;
    public $downloadsCounter;
    public $disabled = false;

    public function download(): BinaryFileResponse
    {
        $this->disabled = true;
        $this->replay->increment('downloads_counter');
        $this->downloadsCounter = $this->replay->downloadsCounter();
        return response()->download($this->replay->file);

    }

    public function render()
    {
        return view('livewire.replay.home-page-download');
    }
}
