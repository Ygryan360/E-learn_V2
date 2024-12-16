<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $categories = Category::all();
        return view('dashboard', compact('courses', 'categories'));
    }
    public function show(Course $course)
    {
        $views = $course->views;
        $views++;
        $course->update(['views' => $views]);
        return view('course.show', compact('course'));
    }
    public function create()
    {
        $course = new Course();
        return view('course.create', compact('course'));
    }
    public function store(CourseRequest $request)
    {
        $course = Course::create($this->extractData($request));
        return redirect()->route('course.show', $course->id)->with('success', 'Le cours à bien été créé');
    }
    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }
    public function update(CourseRequest $request, Course $course)
    {
        $course->update($this->extractData($request));
        return redirect()->route('course.show', $course->id)->with('success', 'Le cours à bien été modifié !');
    }
    public function delete(Course $course)
    {
        $course->delete();
        return redirect()->route('dashboard')->with('success', 'Le cours à bien été suprimé !');
    }

    private function extractData(CourseRequest $request): array
    {
        $validated = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['name'] = $validated['name'];
        $data['description'] = $validated['description'];
        $data['category_id'] = $validated['category'];
        $data['content'] = $validated['content'];
        $data['last_edit'] = now();
        return $data;
    }
}
