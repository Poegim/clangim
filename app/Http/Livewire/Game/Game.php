<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\ClanWars\Game as GameModel;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class Game extends Component
{
    public $clanWar;

    public $createModalVisibility = false;
    public $editModalVisibility = false;
    public $deleteModalVisibility = false;
    public $modelId;

    public $clan_war_id;
    public $type;
    public $result;
    public $home_player_1, $home_player_2, $home_player_3, $home_player_4;
    public $enemy_player_1, $enemy_player_2, $enemy_player_3, $enemy_player_4;

    public function rules(): array
    {
        return [
            'type' => ['integer', 'min:1','max:4'],
            'result' => ['integer', 'min:0','max:1'],
            'home_player_1' => ['nullable', 'exists:users,id'],
            'home_player_2' => ['nullable', 'exists:users,id'],
            'home_player_3' => ['nullable', 'exists:users,id'],
            'home_player_4' => ['nullable', 'exists:users,id'],
            'enemy_player_1' => ['nullable', 'string', 'min:3', 'max:13'],
        ];
    }

    public function showCreateModal(): void
    {
        $this->type = null;
        $this->result = null;
        $this->resetErrorBag();
        $this->createModalVisibility = true;
    }

    public function showEditModal($id): Void
    {
        $this->resetErrorBag();
        $this->modelId = $id;
        $this->loadModel();
        $this->editModalVisibility = true;

    }

    public function showDeleteModal($id): Void
    {
        $this->modelId = $id;
        $this->loadModel();
        $this->deleteModalVisibility = true;
    }

    public function loadModel()
    {
        $data = GameModel::findOrFail($this->modelId);
        $this->result = $data->result;
        $this->type = $data->type;
        $this->home_player_1 = $data->home_player_1;
        $this->home_player_2 = $data->home_player_2;
        $this->home_player_3 = $data->home_player_3;
        $this->home_player_4 = $data->home_player_4;
        $this->enemy_player_1 = $data->enemy_player_1;
        $this->enemy_player_2 = $data->enemy_player_2;
        $this->enemy_player_3 = $data->enemy_player_3;
        $this->enemy_player_4 = $data->enemy_player_4;

    }

    public function create(): void
    {

        $this->validate();

        GameModel::create([
            'clan_war_id' => $this->clanWar->id,
            'type' => $this->type,
            'result' => $this->result,
        ]);

        $this->resetErrorBag();
        $this->type = null;
        $this->result = null;
        $this->createModalVisibility = false;
        session()->flash('success', 'Game added.');


    }

    public function read(): Collection
    {
        $games = GameModel::where('clan_war_id', $this->clanWar->id)->get();
        return $games;
    }

    public function update(): Void
    {
        $game = GameModel::findOrFail($this->modelId);
        $this->validate();
        $game->update($this->modelData());
        $this->cancel();
        session()->flash('success', 'Game saved.');    
    }

    public function delete(): Void
    {
        $game = GameModel::findOrFail($this->modelId);
        $game->delete();
        $this->cancel();
        session()->flash('success', 'Game deleted.');
    }

    public function modelData(): Array
    {
        return [
            'result' => $this->result,
            'type' => $this->type,
            'home_player_1' => $this->home_player_1,
            'home_player_2' => $this->home_player_2,
            'home_player_3' => $this->home_player_3,
            'home_player_4' => $this->home_player_4,
            'enemy_player_1' => $this->enemy_player_1,
            'enemy_player_2' => $this->enemy_player_2,
            'enemy_player_3' => $this->enemy_player_3,
            'enemy_player_4' => $this->enemy_player_4,
        ];
    }

    public function cancel(): void
    {

        $this->result = null;
        $this->type = null;
        $this->home_player_1 = null;
        $this->home_player_2 = null;
        $this->home_player_3 = null;
        $this->home_player_4 = null;
        $this->enemy_player_1 = null;
        $this->enemy_player_2 = null;
        $this->enemy_player_3 = null;
        $this->enemy_player_4 = null;
        $this->modelId = null;
        $this->createModalVisibility = false;
        $this->editModalVisibility = false;
        $this->deleteModalVisibility = false;

    }

    public function render(): View
    {
        return view('livewire.game.game', [
            'games' => $this->read(),
            'users' => User::where('role', '<=', '6')->where('id', '!=', '1')->get(),
        ]);
    }
}
