<?php

namespace App\Http\Livewire\Game;

use Livewire\Component;
use App\Models\ClanWars\Game as GameModel;
use App\Models\ClanWars\GameEnemyPlayer;
use App\Models\ClanWars\GameHomePlayer;
use Illuminate\Database\Eloquent\Collection;

class Game extends Component
{
    public $clanWar;
    public $gameModel;
    public $modelId;

    public $editTypeModalVisibility = false;
    public $deleteModalVisibility = false;

    public $type;
    public $homePlayers;
    public $enemyPlayers;

    public function showEditTypeModal(int $id): void
    {
        $this->modelId = $id;
        $this->loadModel();
        $this->resetErrorBag();
        $this->editTypeModalVisibility = true;
    }

    public function updateType()
    {
        if($this->type == $this->gameModel->type)
        {
            $this->editTypeModalVisibility = false;
        } else
        {

            if($this->type < $this->gameModel->type)
            {

                $homePlayers = GameHomePlayer::where('game_id', $this->modelId)->count();
                $enemyPlayers =  GameEnemyPlayer::where('game_id', $this->modelId)->count();

                if($homePlayers > $this->type)
                {
                    GameHomePlayer::where('game_id', $this->modelId)
                        ->orderBy('created_at', 'desc')
                        ->limit($homePlayers - $this->type)
                        ->delete();

                }

                if($enemyPlayers > $this->type)
                {
                    GameEnemyPlayer::where('game_id', $this->modelId)
                        ->orderBy('created_at', 'desc')
                        ->limit($homePlayers - $this->type)
                        ->delete();
                }

            }

            $this->gameModel->type = $this->type;
            $this->gameModel->save();
            $this->editTypeModalVisibility = false;
            session()->flash('success', 'Game type updated.');
        }
    }

    public function loadModel(): Void
    {
        if($this->modelId != NULL)
        {
            $data = GameModel::findOrFail($this->modelId);
            $this->enemyPlayers = $data->enemyPlayers;
            $this->homePlayers = $data->homePlayers;
            $this->type = $data->type;
            $this->gameModel = $data;
        }
    }

    public function read(): Collection
    {
        $games = GameModel::with(['homePlayers.user', 'enemyPlayers'])->where('clan_war_id', $this->clanWar->id)->get();
        return $games;
    }

    public function render()
    {
        return view('livewire.game.game', [
            'games' => $this->read(),
        ]);
    }


}
