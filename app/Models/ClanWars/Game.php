<?php

namespace App\Models\ClanWars;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

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
                return '4b4';
                break;            
        }
    }

    public function clanWar(): BelongsTo
    {
        return $this->belongsTo(ClanWar::class);
    }

}
