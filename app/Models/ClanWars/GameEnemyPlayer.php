<?php

namespace App\Models\ClanWars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameEnemyPlayer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'game_enemy_players';

    public function games()
    {
        $this->hasMany(Game::class);
    }
    
}
