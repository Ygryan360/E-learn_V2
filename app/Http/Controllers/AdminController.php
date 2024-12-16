<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalCourses = Course::count();
        $totalCategories = Category::count();
        $totalViews = $totalCourses * 30;
        $users = User::all();
        $courses = Course::all();
        $categories = Category::all();
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalCourses' => $totalCourses,
            'totalCategories' => $totalCategories,
            'totalViews' => $totalViews,
            'users' => $users,
            'courses' => $courses,
            'categories' => $categories,
        ]);
    }
}
