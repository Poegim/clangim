<?php

namespace App\Providers;

use App\Models\Reply;
use App\Models\Thread;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostComment;
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
