<?php

namespace App\Models\Replays;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplayComment extends Model
{
   
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function replay(): BelongsTo
    {
        return $this->belongsTo(Replay::class);
    }

    public function createdAt()
    {
        return $this->created_at;
    }

}
