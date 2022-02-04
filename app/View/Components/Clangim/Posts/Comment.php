<?php

namespace App\View\Components\Clangim\Posts;

use Illuminate\View\Component;

class Comment extends Component
{

    public $postComment;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($postComment)
    {
        $this->postComment = $postComment;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.clangim.posts.comment');
    }
}
