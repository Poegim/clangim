<?php

namespace App\Models\Forum;

use App\Http\Traits\HasEditedBy;
use App\Http\Traits\HasUser;
use Carbon\Carbon;
use App\Models\Forum\Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;
    use HasEditedBy;
    use HasUser;

    protected $touches = ['thread'];

    public function thread(): BelongsTo
    {
        return $this->belongsTo(Thread::class, 'thread_id');
    }

    public function body(): string
    {
        return $this->body;
    }

    public function createdAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d H:i');
    }

    public function updatedAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->diffForHumans();
    }



}
