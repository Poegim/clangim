<?php

namespace App\Models\ClanWars;

use App\Models\User;
use App\Models\ClanWars\Game;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GameHomePlayer extends Model
{
    use HasFactory;

    protected $table = 'game_home_players';
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

}