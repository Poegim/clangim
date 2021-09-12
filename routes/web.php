<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThreadsController;
use App\Http\Controllers\CategoriesController;

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
    return view('dashboard');
})->name('dashboard');

/*
| Categories routes group.
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');


});

/*
| Threads routes group.
*/
Route::middleware(['auth'])->group(function () {

    Route::get('/threads', [ThreadsController::class, 'index'])->name('threads');


});


