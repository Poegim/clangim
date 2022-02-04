<?php

namespace App\Http\Livewire\Reply;

use Livewire\Component;
use Livewire\Redirector;
use App\Policies\ReplyPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;

class Delete extends Component
{

    use AuthorizesRequests;
    public $reply;
    public $slug;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function deleteReply(): Redirector
    {
        $this->authorize(ReplyPolicy::DELETE, $this->reply);
        $this->slug = $this->reply->thread->slug;
        $this->reply->delete();

        session()->flash('success', 'Reply deleted successfully!');

        return redirect()->route('threads.show', $this->slug);
    }


    public function render(): View
    {
        return view('livewire.reply.delete');
    }
}
