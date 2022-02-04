<?php

namespace App\Http\Livewire\Replay;

use Illuminate\View\View;
use Livewire\Component;
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

    public function render(): View
    {
        return view('livewire.replay.home-page-download');
    }
}
