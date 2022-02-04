<?php

namespace App\Http\Livewire\Delete;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Livewire\Redirector;

class Delete extends Component
{

    public $item;
    public $temporaryItem;
    public $modalVisibility = false;
    public $class;

    public function loadModal(): void
    {
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function delete(): void
    {

        $this->class = get_class($this->item);

        if(isset($this->item->image))
        {
            File::delete($this->item->image);
        }

        if(isset($this->item->file))
        {
            File::delete($this->item->file);
        }

        $this->temporaryItem = $this->item;
        $this->item->delete();
        session()->flash('success', 'Deleted successfully!');
        $this->comebackRoute();

    }

    public function comebackRoute()
    {
        switch ($this->class) {
            case 'App\Models\Posts\Post':
                return redirect()->route('dashboard');
                break;

            case 'App\Models\Posts\PostComment':
                return redirect()->route('post.show', $this->temporaryItem->post->slug);
                break;

            case 'App\Models\Forum\Category':
                return redirect()->route('categories.index');
                break;

            default:
                return redirect()->route('dashboard');
                break;
        }
    }


    public function render()
    {
        return view('livewire.delete.delete');
    }
}
