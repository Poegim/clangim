<?php

namespace App\Http\Livewire\Thread;

use Livewire\Component;
use Livewire\Redirector;
use App\Policies\ThreadPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{

    use AuthorizesRequests;
    public $thread;
    public $category;
    public $modalVisibility = false;

    public function loadModal(): void
    {

        $this->resetErrorBag();
        $this->modalVisibility = true;

    }

    public function deleteThread(): Redirector
    {
        $this->authorize(ThreadPolicy::DELETE, $this->thread);
        $this->category = $this->thread->category;
        $this->thread->delete();

        session()->flash('success', 'Thread deleted successfully!');

        return redirect()->route('categories.show', $this->category->slug);
    }


    public function render()
    {
        return view('livewire.thread.delete');
    }
}
