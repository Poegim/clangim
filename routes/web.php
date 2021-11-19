<?php

use App\Http\Controllers\ClanWars\ClanWarController;
use App\Http\Controllers\ClanWars\GameController;
use App\Http\Controllers\Posts\PostCommentController;
use App\Http\Controllers\Posts\PostController;
use App\Http\Controllers\Forum\ReplyController;
use App\Http\Controllers\Forum\ThreadController;
use App\Http\Controllers\Forum\CategoryController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('dashboard');


// Auth routes.
Route::middleware(['auth'])->group(function () {

    // Clan Wars
    Route::get('/clan-wars/create', [ClanWarController::class, 'create'])->name('clan-wars.create');
    Route::post('/clan-wars/store', [ClanWarController::class, 'store'])->name('clanWars.store');

    //Games
    Route::get('/games/{clanWar:id}/edit', [GameController::class, 'edit'])->name('games.edit');
    

    // PostComments.
    Route::post('/postComment/store', [PostCommentController::class, 'store'])->name('postComment.store');
    Route::get('/postComment/{postComment:id}/edit', [PostCommentController::class, 'edit'])->name('postComment.edit');
    Route::post('/postComment/{postComment:id}/update', [PostCommentController::class, 'update'])->name('postComment.update');

    // Posts.
    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('post/{post:slug}/update', [PostController::class, 'update'])->name('post.update');

    // Categories.
    Route::get('/category/all', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/category/create/', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/category/{category:slug}/update', [CategoryController::class, 'update'])->name('categories.update');

    // Threads.
    Route::post('/thread', [ThreadController::class, 'store'])->name('threads.store');
    Route::get('/thread/{thread:slug}', [ThreadController::class, 'show'])->name('threads.show');
    Route::get('/thread/{thread:slug}/edit', [ThreadController::class, 'edit'])->name('threads.edit');
    Route::post('/thread/{thread:slug}/update', [ThreadController::class, 'update'])->name('threads.update');
    Route::get('/thread/{category:slug}/create', [ThreadController::class, 'create'])->name('threads.create');

    // Replies.
    Route::post('/replies/store', [ReplyController::class, 'store'])->name('replies.store');
    Route::get('/replies/{reply:id}/edit', [ReplyController::class, 'edit'])->name('replies.edit');
    Route::post('/replies/{reply:id}/update', [ReplyController::class, 'update'])->name('replies.update');

});

// Non-auth routes.

// Clan Wars.
Route::get('/clan-wars/all', [ClanWarController::class, 'index'])->name('clan-wars.index');

// Posts.
Route::get('/post/{post:slug}', [PostController::class, 'show'])->name('post.show');

