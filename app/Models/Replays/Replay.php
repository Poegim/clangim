<?php

namespace App\Models\Replays;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Replay extends Model
{
    use HasFactory;

    public $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function playerOneTeam(): string
    {
        switch ($this->player_1_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }

    public function playerTwoTeam(): string
    {
        switch ($this->player_2_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }

    public function playerThreeTeam(): string
    {
        switch ($this->player_3_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }

    public function playerFourTeam(): string
    {
        switch ($this->player_4_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }

    public function playerFiveTeam(): string
    {
        switch ($this->player_5_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }

    public function playerSixTeam(): string
    {
        switch ($this->player_5_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }

    public function playerSevenTeam(): string
    {
        switch ($this->player_7_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }

    public function playerEightTeam(): string
    {
        switch ($this->player_8_team) {
            case '1':
                return 'from-red-400';
                break;
            case '2':
                return 'from-blue-400';
                break;
            case '3':
                return 'from-teal-400';
                break;
            case '4':
                return 'from-purple-400';
                break;
            case '5':
                return 'from-orange-400';
                break;
            case '6':
                return 'from-brown-400';
                break;
            case '7':
                return 'from-yellow-400';
                break;
            case '8':
                return 'from-green-400';
                break;
            
            default:
                return 'from-red-400';
                break;
        }
    }
    
    public function createdAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
    }

    public function updatedAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->diffForHumans();
    }
    
}
