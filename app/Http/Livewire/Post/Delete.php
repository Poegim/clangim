<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Livewire\Redirector;
use Illuminate\View\View;
use App\Policies\PostPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{

    use AuthorizesRequests;
    public $post;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function deletePost(): Redirector
    {
        $this->authorize(PostPolicy::DELETE, $this->post);
        $this->post->delete();

        session()->flash('success', 'Post deleted successfully!');

        return redirect()->route('dashboard');
    }
    
    public function render(): View
    {
        return view('livewire.post.delete');
    }
}
