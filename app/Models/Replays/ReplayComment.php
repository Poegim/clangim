<?php

namespace App\Models\Replays;

use App\Http\Traits\HasEditedBy;
use App\Http\Traits\HasUser;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReplayComment extends Model
{

    use HasFactory;
    use HasEditedBy;
    use HasUser;

    protected $guarded = [];

    public function replay(): BelongsTo
    {
        return $this->belongsTo(Replay::class);
    }

    public function createdAt()
    {
        return $this->created_at;
    }

    public function updatedAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->diffForHumans();
    }

}
