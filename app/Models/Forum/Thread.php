<?php

namespace App\Models\Forum;

use App\Http\Traits\HasEditedBy;
use App\Http\Traits\HasUser;
use Carbon\Carbon;
use App\Models\Forum\Reply;
use App\Models\Forum\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Thread extends Model
{
    use HasFactory;
    use HasEditedBy;
    use HasUser;

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function replies(): HasMany
    {
        return $this->hasMany(Reply::class)->with('user');
    }

    public function body(): string
    {
        return $this->body;
    }

    public function updatedAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->diffForHumans();
    }

    public function createdAt(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('Y-m-d H:i');
    }

    public function lastReply(): HasOne
    {
        return $this->hasOne(Reply::class)->latest();
    }


}
