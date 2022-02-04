<?php

namespace App\Models\Posts;

use Carbon\Carbon;
use App\Models\Posts\Post;
use App\Http\Traits\HasEditedBy;
use App\Http\Traits\HasUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostComment extends Model
{
    use HasFactory;
    use HasEditedBy;
    use HasUser;

    protected $touches = ['post'];
    protected $with = [
        'user',
        'editedBy',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'post_id');
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
