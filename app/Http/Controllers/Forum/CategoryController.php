<?php

namespace App\Http\Controllers\Forum;

use App\Models\Forum\Category;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{

    public function index(): View
    {
        $this->authorize('viewAny', Category::class);
        $categories = Category::with('threads.editedBy')->get();

        return view('categories.index', [
            'categories' => $categories
            ]);
    }


    public function show(Category $category): View
    {
        $this->authorize('view', $category);
        return view('categories.show', compact('category'));
    }


    public function create(): View
    {
        $this->authorize('create', Category::class);
        return view('categories.create');
    }


    public function store(Request $request): RedirectResponse
    {
        $this->authorize('create', Category::class);
        $this->validate($request, [
            'name' => [
                'required',
                'min:3',
                'max:15',
                'unique:categories,name'
            ],
            'description' => [
                'min:5',
                'max:50',
            ],
            'hidden' => [
                'required',
            ],
        ], [
                'hidden.required' => 'You have to choose visibility!',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->hidden = $request->hidden;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category added.');
    }


    public function edit(Category $category): View
    {
        $this->authorize('update', $category);
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, Category $category): RedirectResponse
    {
        $this->authorize('update', $category);
        $this->validate($request, [
            'name' => [
                'required',
                'min:3',
                'max:15',
                Rule::unique('categories')->ignore($category->id, 'id'),
            ],
            'description' => [
                'min:5',
                'max:50',
            ],
            'hidden' => [
                'required',
                ],
            ], [
                'hidden.required' => 'You have to choose visibility!',
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category saved.');
    }


}
