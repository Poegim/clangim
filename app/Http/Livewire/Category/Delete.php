<?php

namespace App\Http\Livewire\Category;

use App\Policies\CategoryPolicy;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use Livewire\Redirector;

class Delete extends Component
{

    use AuthorizesRequests;
    public $category;
    public $modalVisibility = false;

    public function loadModal(): void
    {

        $this->resetErrorBag();
        $this->modalVisibility = true;

    }

    public function deleteCategory(): Redirector
    {
        $this->authorize(CategoryPolicy::DELETE, $this->category);

        $this->category->delete();

        session()->flash('success', 'Category deleted successfully!');

        return redirect()->route('categories.index');
    }

    public function render(): View
    {
        return view('livewire.category.delete');
    }
}
