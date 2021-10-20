<?php

namespace App\Providers;

use App\Models\Forum\Reply;
use App\Models\Forum\Thread;
use App\Models\Forum\Category;
use App\Models\Posts\Post;
use App\Models\Posts\PostComment;
use App\Policies\ReplyPolicy;
use App\Policies\ThreadPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\PostCommentPolicy;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Thread::class => ThreadPolicy::class,
        Category::class => CategoryPolicy::class,
        Reply::class => ReplyPolicy::class,
        Post::class => PostPolicy::class,
        PostComment::class => PostCommentPolicy::class, 

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
