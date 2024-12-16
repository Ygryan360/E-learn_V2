<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $courses = $category->courses(5);
        return view('category.show', compact('category', 'courses'));
    }
    public function create()
    {
        $category = new Category();
        return view('category.create', compact('category'));
    }
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $category = Category::create($data);
        redirect()->route('category.show', $category->id)->with('succes', 'La catégorie à bien été créée !');
    }
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('category.show', $category->id)->with('succes', 'La catégorie à bien été modifiée !');
    }
    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('dashboard')->with('succes', 'Le cours à bien été suprimé !');
    }
}
