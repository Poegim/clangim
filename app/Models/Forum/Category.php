<?php

namespace App\Models\Forum;

use App\Models\Forum\Thread;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function createdAt()
    {
        return $this->created_at->format('d-m-Y');
    }

    public function threads(): HasMany
    {
        return $this->hasMany(Thread::class, 'category_id')->withCount('replies')->orderByDesc('updated_at');
    }

    public function threadsLimited(): HasMany
    {
        return $this->hasMany(Thread::class, 'category_id')->with('user')->withCount('replies')->limit(5)->orderByDesc('updated_at');
    }

}
