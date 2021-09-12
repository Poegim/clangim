<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Thread;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ThreadsController extends Controller
{

    public function index(): View
    {
        return view('threads.index', [
            'threads' => Thread::all(),
            'categories' => Category::all(),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

}
