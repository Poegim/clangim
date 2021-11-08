<?php

namespace App\Http\Livewire\ClanWar;

use Livewire\Component;
use App\Models\ClanWars\Game;

class Games extends Component
{
    protected $listeners = ['refresh' => '$refresh'];
    public $games;
    public $modelId;

    public $home_player_1, $home_player_2, $home_player_3, $home_player_4;
    public $enemy_player_1, $enemy_player_2, $enemy_player_3, $enemy_player_4;

    public $result;
    public $players;

    public $editModalVisibility = false;
    public $deleteModalVisibility = false;

    public function editShowModal($id)
    {
        $this->modelId = $id;
        $this->resetValidation();
        $this->resetErrorBag();
        $this->loadModel();
        $this->editModalVisibility = true;
        
    }

    public function loadModel()
    {
        $data = Game::findOrFail($this->modelId);
        $this->home_player_1 = $data->home_player_1;
        $this->home_player_2 = $data->home_player_2;
        $this->home_player_3 = $data->home_player_3; 
        $this->home_player_4 = $data->home_player_4; 
        $this->enemy_player_1 = $data->enemy_player_1; 
        $this->enemy_player_2 = $data->enemy_player_2; 
        $this->enemy_player_3 = $data->enemy_player_3; 
        $this->enemy_player_4 = $data->enemy_player_4; 
        $this->result = $data->result; 
    }


    public function render()
    {
        return view('livewire.clan-war.games');
    }
}
