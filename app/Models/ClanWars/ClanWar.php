<?php

namespace App\Models\ClanWars;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClanWar extends Model
{
    use HasFactory;

    protected $dates = ['date'];

    public function id(): int
    {
        return $this->id;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function games(): HasMany
    {
        return $this->hasMany(Game::class)->orderByDesc('updated_at');
    }

    public function gamesCount():int
    {
        return $this->games()->count();
    }

    public function createdAt():string
    {
        return $this->created_at->format('d-m-Y H:i');
    }

    public function date():string
    {
        return $this->date->format('d-m-Y H:i');
    }

}
