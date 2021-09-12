<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\View\View;


class CategoriesController extends Controller
{
    public function index(): View
    {

        return view('categories.index', [
            'categories' => Category::all(),
        ]);
    }
}
