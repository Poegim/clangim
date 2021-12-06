<?php

namespace App\Http\Livewire\ClanWar;

use App\Policies\ClanWarPolicy;
use Livewire\Component;
use Livewire\Redirector;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{

    use AuthorizesRequests;
    public $clanWar;
    public $modalVisibility = false;

    public function loadModal(): void
    {
        $this->authorize(ClanWarPolicy::DELETE, $this->clanWar);
        $this->resetErrorBag();
        $this->modalVisibility = true;
    }

    public function deleteClanWar(): Redirector
    {
        $this->authorize(ClanWarPolicy::DELETE, $this->clanWar);

        $this->clanWar->delete();

        session()->flash('success', 'Clan War deleted successfully!');

        return redirect()->route('clan-wars.index');
    }

    public function render(): View
    {
        return view('livewire.clan-war.delete');
    }
}
