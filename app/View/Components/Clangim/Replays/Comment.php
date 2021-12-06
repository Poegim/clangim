<?php

namespace App\View\Components\Clangim\Replays;

use Illuminate\View\Component;

class Comment extends Component
{

    public $comment;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.clangim.replays.comment');
    }
}
