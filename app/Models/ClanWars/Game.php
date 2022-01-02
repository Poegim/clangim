<?php

namespace App\Models\ClanWars;

use App\Models\ClanWars\GameHomePlayer;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClanWars\GameEnemyPlayer;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homePlayers()
    {
        return $this->hasMany(GameHomePlayer::class, 'game_id');
    }

    public function enemyPlayers()
    {
        return $this->hasMany(GameEnemyPlayer::class, 'game_id');
    }

    public function id(): int
    {
        return $this->id;
    }

    public function type(): string
    {
        switch ($this->type) {
            case 1:
                return '1v1';
                break;
            case 2:
                return '2v2';
                break;
            case 3:
                return '3v3';
                break;
            case 4:
                return '4v4';
                break;            
        }
    }

    public function clanWar(): BelongsTo
    {
        return $this->belongsTo(ClanWar::class);
    }

}
