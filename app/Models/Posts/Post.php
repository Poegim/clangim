<?php

namespace App\Models\Posts;

use App\Http\Traits\HasEditedBy;
use App\Http\Traits\HasUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use HasEditedBy;
    use HasUser;

    protected $with = [
        'user',
        'postComments',
    ];

    public function postComments(): HasMany
    {
        return $this->hasMany(PostComment::class);
    }

    public function body(): string
    {
        return $this->body;
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
