<?php

namespace App\Http\Livewire\Game;

use App\Models\User;
use Livewire\Component;
use App\Models\ClanWars\Game;

class Edit extends Component
{

    public $home_player_1, $home_player_2, $home_player_3, $home_player_4;
    public $enemy_player_1, $enemy_player_2, $enemy_player_3, $enemy_player_4;

    public $result;
    public $game;
    public $players;

    public $modalVisibility = false;

    protected $rules = [
        'enemy_player_1' => ['nullable', 'string', 'min:3', 'max:14'],
        'enemy_player_2' => ['nullable', 'string', 'min:3', 'max:14'],
        'enemy_player_3' => ['nullable', 'string', 'min:3', 'max:14'],
        'enemy_player_4' => ['nullable', 'string', 'min:3', 'max:14'],
    ];

    public function updated()
    {
        $this->validate();
        
    }

    public function edit()
    {
        $this->resetErrorBag();
        $this->resetInputFields();
        $this->modalVisibility = true;  

    }

    public function cancel()
    {
        $this->modalVisibility = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->validate([
            'enemy_player_1' => ['nullable', 'string', 'min:3', 'max:14'],
            'enemy_player_2' => ['nullable', 'string', 'min:3', 'max:14'],
            'enemy_player_3' => ['nullable', 'string', 'min:3', 'max:14'],
            'enemy_player_4' => ['nullable', 'string', 'min:3', 'max:14'],
        ]);


        $game = Game::findOrFail($this->game->id);
        $game->update([
            'home_player_1' => $this->home_player_1,
            'home_player_2' => $this->home_player_2,
            'home_player_3' => $this->home_player_3,
            'home_player_4' => $this->home_player_4,
            'enemy_player_1' => $this->enemy_player_1,
            'enemy_player_2' => $this->enemy_player_2,
            'enemy_player_3' => $this->enemy_player_3,
            'enemy_player_4' => $this->enemy_player_4,
            'result' => $this->result,
        ]);

        session()->flash('message', 'Game updated!.');
        $this->resetInputFields();
        $this->modalVisibility = false;
        $this->emit('refresh');


    }

    private function resetInputFields(){

        $game = Game::where('id',$this->game->id)->first();

        $this->home_player_1 = $game->homePlayerOne->id;
        $this->home_player_2 = $game->homePlayerTwo->id;
        $this->home_player_3 = $game->homePlayerThree->id;
        $this->home_player_4 = $game->homePlayerFour->id;
        $this->enemy_player_1 = $game->enemy_player_one;
        $this->enemy_player_2 = $game->enemy_player_two;
        $this->enemy_player_3 = $game->enemy_player_three;
        $this->enemy_player_4 = $game->enemy_player_four;
        $this->result = $game->result;
    }

    public function render()
    {
        $this->players = User::orderBy('name')->get();
        return view('livewire.game.edit');
    }
}
