<?php

namespace App\Http\Livewire\Game;

use App\Models\User;
use Livewire\Component;
use App\Models\ClanWars\GameHomePlayer;
use App\Models\ClanWars\GameEnemyPlayer;
use App\Models\ClanWars\Game as GameModel;
use Illuminate\Database\Eloquent\Collection;

class Game extends Component
{

    public $clanWar;

    public $gameModel;
    public $modelId;
    public $modelType;

    public $homePlayerModel;
    public $enemyPlayerModel;

    public $homePlayers;
    public $enemyPlayers;

    public $addGameModalVisibility = false;
    public $addHomePlayerModalVisibility = false;
    public $addEnemyPlayerModalVisibility = false;
    public $editGameModalVisibility = false;
    public $editHomePlayerModalVisibility = false;
    public $editEnemyPlayerModalVisibility = false;
    public $deleteModalVisibility = false;

    //Html inputs
    public $type;
    public $result;
    public $home_player;
    public $enemy_player;
    public $add_enemy_player;
    public $add_home_player = 2; //Default value for HTML input select when adding new home player.
    public $add_game_result = 1; //Default value for HTML input select result when addmin new game;
    public $add_game_type = 1; //Default value fot HTML input select game type when addmin new game.

    protected $validationAttributes = [
        'add_enemy_player' => 'enemy player',
        'add_home_player' => 'home player',
        'add_game_result' => 'result',
        'add_game_type' => 'type',
    ];

    public function showAddGameModal(): void
    {
        $this->add_game_type = 1;
        $this->add_game_result = 1;
        $this->resetErrorBag();
        $this->addGameModalVisibility = true;
    }


    public function showAddHomePlayerModal(int $gameId): void
    {
        $this->modelId = $gameId;
        $this->resetErrorBag();
        $this->addHomePlayerModalVisibility = true;

    }

    public function showAddEnemyPlayerModal(int $gameId): void
    {
        $this->add_enemy_player = null;
        $this->modelId = $gameId;
        $this->resetErrorBag();
        $this->addEnemyPlayerModalVisibility = true;

    }

    public function storeGame(): void
    {
        $this->validate([
            'add_game_type' => [
                'required', 'integer', 'min:1', 'max:4',
            ],
            'add_game_result' => [
                'required', 'integer', 'min:0', 'max:1',
            ],
        ]);

        GameModel::create([
            'clan_war_id'   => $this->clanWar->id,
            'type'  => $this->add_game_type,
            'result'    => $this->add_game_result,
        ]);

        $this->addGameModalVisibility = false;
        session()->flash('success', 'Game added.');
    }

    public function storeEnemyPlayer(): void
    {

        $this->validate(
            ['add_enemy_player' => [
                'required', 'string',
            ],
        ]);

        GameEnemyPlayer::create([
            'name' => $this->add_enemy_player,
            'game_id'   => $this->modelId,
            'clan_war_id'   => $this->clanWar->id,
        ]);

        $this->addEnemyPlayerModalVisibility = false;
        session()->flash('success', 'Player added.');

    }

    public function storeHomePlayer(): void
    {           
        $this->validate(
            [
                'add_home_player' => [
                    'required', 'exists:users,id',
                ],
        ]);

        GameHomePlayer::create([
            'user_id'   => $this->add_home_player,
            'game_id'   => $this->modelId,
            'clan_war_id'   => $this->clanWar->id,
        ]);

        $this->addHomePlayerModalVisibility = false;
        session()->flash('success', 'Player added.');
        $this->add_home_player = 2; //Reset default select input to Captain.
    }


    public function showEditGameModal(int $id): void
    {
        $this->modelId = $id;
        $this->loadModel();
        $this->resetErrorBag();
        $this->editGameModalVisibility = true;
    }

    public function showEditHomePlayerModal(int $id): void
    {
        $this->homePlayerModel = GameHomePlayer::findOrFail($id);
        $this->home_player = $this->homePlayerModel->user_id;
        $this->resetErrorBag();
        $this->editHomePlayerModalVisibility = true;
    }

    public function showEditEnemyPlayerModal(int $id): void
    {
        $this->enemyPlayerModel = GameEnemyPlayer::findOrFail($id);
        $this->enemy_player = $this->enemyPlayerModel->name;
        $this->resetErrorBag();
        $this->editEnemyPlayerModalVisibility = true;
    }

    public function updateGame()
    {
        $this->validate([

            'type' => [
                'required', 'integer', 'min:1', 'max:4',
                ],
            'result' => [
                'required', 'integer', 'min:0', 'max:1',
            ],
            
        ]);
        
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
        $this->gameModel->result = $this->result;
        $this->gameModel->save();
        $this->editGameModalVisibility = false;

        session()->flash('success', 'Game updated.');
    }

    public function updateHomePlayer()
    {

        $this->validate(
            [
                'home_player' => [
                    'required', 'exists:users,id',
                ],
        ]);

        $this->homePlayerModel->user_id = $this->home_player;
        $this->homePlayerModel->save();
        $this->editHomePlayerModalVisibility = false;
        session()->flash('success', 'Home player updated.');

    }

    public function showDeleteModal(int $id, string $modelType): void
    {
        $this->modelId = $id;
        $this->modelType = $modelType;

        if($this->modelType == 'game')
        {
            $this->loadModel();
        }

        $this->resetErrorBag();
        $this->deleteModalVisibility = true;
    }

    public function deleteGame()
    {
        $this->gameModel->delete();
        $this->deleteModalVisibility = false;
        session()->flash('success', 'Game deleted.');
    }

    public function deleteHomePlayer()
    {
        $homePlayer = GameHomePlayer::findOrFail($this->modelId);
        $homePlayer->delete();
        $this->deleteModalVisibility = false;
        session()->flash('success', 'Home Player deleted.');
    }

    public function deleteEnemyPlayer()
    {
        $enemyPlayer = GameEnemyPlayer::findOrFail($this->modelId);
        $enemyPlayer->delete();        
        $this->deleteModalVisibility = false;
        session()->flash('success', 'Enemy Player deleted.');
    }

    public function loadModel(): Void
    {
        if($this->modelId != NULL)
        {
            $data = GameModel::findOrFail($this->modelId);
            $this->enemyPlayers = $data->enemyPlayers;
            $this->homePlayers = $data->homePlayers;
            $this->type = $data->type;
            $this->result = $data->result;
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
            'teamPlayers' => User::where('role', '<=', 5)->where('role', '>', 1)->get(),
        ]);
    }

}
