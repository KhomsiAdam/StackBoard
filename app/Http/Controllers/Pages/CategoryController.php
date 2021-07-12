<?php

namespace App\Http\Controllers\Pages;

use App\Models\Thread;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Category $category) {
        return view('pages.category.index', [
            'threads' => Thread::where($category->id())->paginate(10)
        ]);
    }
}
