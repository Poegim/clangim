<?php

namespace App\Models\ClanWars;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homePlayerOne(): BelongsTo
    {
        return $this->belongsTo(User::class, 'home_player_1');
    }

    public function homePlayerTwo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'home_player_2');
    }

    public function homePlayerThree(): BelongsTo
    {
        return $this->belongsTo(User::class, 'home_player_3');
    }

    public function homePlayerFour(): BelongsTo
    {
        return $this->belongsTo(User::class, 'home_player_4');
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
