<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {

    return view('dashboard', [
        'posts' => Post::paginate(10),
    ]);

})->name('dashboard');

Route::middleware(['auth'])->group(function () {

    /*
    | Categories routes group.
    */
    Route::get('/category/all', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/category/create/', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/category/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/category/{category:slug}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::post('/category/{category:slug}/update', [CategoryController::class, 'update'])->name('categories.update');

    /*
    | Threads routes group.
    */
    Route::post('/thread', [ThreadController::class, 'store'])->name('threads.store');
    Route::get('/thread/{thread:slug}', [ThreadController::class, 'show'])->name('threads.show');
    Route::get('/thread/{thread:slug}/edit', [ThreadController::class, 'edit'])->name('threads.edit');
    Route::post('/thread/{thread:slug}/update', [ThreadController::class, 'update'])->name('threads.update');
    Route::get('/thread/{category:slug}/create', [ThreadController::class, 'create'])->name('threads.create');

    /*
    | Replies routes group.
    */
    Route::post('/replies/store', [ReplyController::class, 'store'])->name('replies.store');
    Route::get('/replies/{reply:id}/edit', [ReplyController::class, 'edit'])->name('replies.edit');
    Route::post('/replies/{reply:id}/update', [ReplyController::class, 'update'])->name('replies.update');


});

