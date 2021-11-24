<?php

namespace App\Providers;

use App\ClanWars\Models\ClanWar;
use App\ClanWars\Models\Game;
use App\Models\Forum\Reply;
use App\Models\Forum\Thread;
use App\Models\Forum\Category;
use App\Models\Posts\Post;
use App\Models\Posts\PostComment;
use App\Models\Replays\Replay;
use App\Policies\ReplyPolicy;
use App\Policies\ThreadPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\ClanWarPolicy;
use App\Policies\GamePolicy;
use App\Policies\PostCommentPolicy;
use App\Policies\PostPolicy;
use App\Policies\ReplayPolicy;
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
        ClanWar::class => ClanWarPolicy::class,
        Game::class => GamePolicy::class,
        Replay::class => ReplayPolicy::class,

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
