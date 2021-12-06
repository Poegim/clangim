<?php

namespace App\View\Components\Clangim\Replays;

use Illuminate\View\Component;

class AddComment extends Component
{

    public $replayId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($replayId)
    {
        $this->replayId = $replayId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.clangim.replays.add-comment');
    }
}
