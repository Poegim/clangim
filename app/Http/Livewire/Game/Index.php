<?php

namespace App\Http\Livewire\Game;

use App\Models\ClanWars\Game;
use Livewire\Component;

class Index extends Component
{
    public $game;

    public function updated()
    {
        $this->game = Game::findOrFail($this->game->id);
    }

    public function render()
    {
        return view('livewire.game.index');
    }
}
