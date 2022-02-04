<?php

namespace App\Models\Replays;

use App\Http\Traits\HasUser;
use App\Models\Replays\Replay;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    use HasFactory;
    use HasUser;

    protected $fillable = [
        'score',
        'user_id',
        'replay_id',
    ];

    public function replay(): BelongsTo
    {
        return $this->belongsTo(Replay::class, 'replay_id');
    }

    public function score(): int
    {
        return $this->score;
    }


}
