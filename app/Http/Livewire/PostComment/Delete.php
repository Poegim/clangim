<?php

namespace App\Http\Livewire\PostComment;

use Livewire\Component;
use Livewire\Redirector;
use App\Models\PostComment;
use App\Policies\PostCommentPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{
    use AuthorizesRequests;

    public $postComment;
    public $modalVisibility = false;
    public $slug;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function deletePostComment(): Redirector
    {
        $this->authorize(PostCommentPolicy::DELETE, $this->postComment);
        $this->slug = $this->postComment->post->slug;
        $this->postComment->delete();

        session()->flash('success', 'Comment deleted successfully!');

        return redirect()->route('post.show', $this->slug);
    }

    
    public function render()
    {
        return view('livewire.post-comment.delete');
    }
}
